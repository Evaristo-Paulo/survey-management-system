<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function my_surveis()
    {
        $id = Auth::user()->id;

        $questions = DB::table('questions')
            ->join('users', function ($join) use ($id) {
                $join->on('questions.user_id', '=', 'users.id')
                    ->where([['users.id', '=', $id]]);
            })
            ->select('questions.*')
            ->get();

        return view('survey.mine', compact('questions'));
    }
    public function survey_details($id)
    {
        $question_id = decrypt($id);
        $user_id = Auth::user()->id;

        $question = DB::table('questions')
            ->join('users', function ($join) use ($user_id, $question_id) {
                $join->on('questions.user_id', '=', 'users.id')
                    ->where([['users.id', '=', $user_id], ['questions.id', '=', $question_id]]);
            })
            ->select('questions.*')
            ->first();

        $function = new Option();

        $options = $function->percentage($question, $user_id);

        return view('survey.details', compact('question', 'options'));
    }
    public function survey_edit_form($id)
    {
        $question_id = decrypt($id);
        $user_id = Auth::user()->id;

        $question = DB::table('questions')
            ->join('users', function ($join) use ($user_id, $question_id) {
                $join->on('questions.user_id', '=', 'users.id')
                    ->where([['users.id', '=', $user_id], ['questions.id', '=', $question_id]]);
            })
            ->select('questions.*')
            ->first();

        $options = DB::table('options')
            ->join('questions', function ($join) use ($question_id) {
                $join->on('options.question_id', '=', 'questions.id')
                    ->where([['questions.id', '=', $question_id]]);
            })
            ->select('options.*')
            ->get();

        return view('survey.edit', compact('question', 'options'));
    }
    public function survey_register_form()
    {
        return view('survey.register');
    }
    public function vote($id)
    {
        $id = decrypt($id);

        $question = Question::find($id);

        $options = DB::table('options')
            ->join('questions', function ($join) use ($id) {
                $join->on('options.question_id', '=', 'questions.id')
                    ->where([['questions.id', '=', $id]]);
            })
            ->select('options.*')
            ->get();

        return view('survey.vote', compact('question', 'options'));
    }


    public function vote_save(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                "answers"    => "required|array|min:1|max:1",
            ], [
                'answers.array.' => 'Vote em uma das opções',
                'answers.require.' => 'Vote em uma das opções',
                'answers.*.require.' => 'Vote em uma das opções',
                'answers.min' => 'Vote em uma das opções de cada vez',
                'answers.max' => 'Vote em uma das opções de cada vez',
            ]);

            if ($validator->fails()) {
                session()->flash('error', 'Verifique os campos e tenta novamente');
                if (session('error')) {
                    Alert::toast(session('error'), 'error');
                }
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $id = decrypt($id);
            $question = Question::find($id);
            $options = $request->input('answers');
            $option_id = $options[0];

            $question->vote = $question->vote + 1;
            $question->save();

            $option = Option::find($option_id);
            $option->vote = $option->vote + 1;
            $option->save();

            session()->flash('success', 'Voto contabilizado com sucesso');
            if (session('success')) {
                Alert::toast(session('success'), 'success');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'ops! Ocorreu algum erro durante o processo');
            if (session('error')) {
                Alert::toast(session('error'), 'error');
            }
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function survey_update(Request $request, $id)
    {
        try {
            $id = decrypt($id);

            $options = Option::where('question_id', $id)->get();
            //Quantas alternativas devem ser adicionadas
            $max = 10 - count($options);

            $validator = Validator::make($request->all(), [
                'question' => 'required',
                "oldoptions"    => "required|array|min:2|max:10",
                'oldoptions.*' => 'required',
                "options"    => "max:" . $max . "",
            ], [
                'question.required' => 'Campo Pergunta é de preenchimento obrigatório',
                'oldoptions.array.' => 'Campo Alternativas deve ser do tipo vetor',
                'oldoptions.require.' => 'Campo Alternativas são de preenchimentos obrigatórios',
                'oldoptions.*.require.' => 'Campo Alternativa é de preenchimento obrigatório',
                'oldoptions.min' => 'A pergunta deve ter no mínimo 2 alternativas.',
                'options.max' => 'A pergunta deve ter no máximo 10 alternativas.',
                'oldoptions.max' => 'A pergunta deve ter no máximo 10 alternativas.',
            ]);

            if ($validator->fails()) {
                session()->flash('error', 'Verifique os campos e tenta novamente');
                if (session('error')) {
                    Alert::toast(session('error'), 'error');
                }
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $question = [
                'question' => $request->input('question'),
            ];

            DB::table('questions')
                ->where('id', $id)
                ->update($question);

            $oldoptions = $request->input('oldoptions');


            foreach ($options as $index => $item) {
                $option = Option::where('id', $item->id)->first();
                $option->option = $oldoptions[$index];
                $option->save();
            }

            $newoptions = $request->input('options');
            // Caso seja adicionado nova alternativa
            if (!is_null($newoptions)) {
                foreach ($newoptions as $item) {
                    $option = new Option();
                    $option->question_id = $id;
                    $option->option = $item;
                    $option->save();
                }
            }

            session()->flash('success', 'Pergunta actualizada com sucesso');
            if (session('success')) {
                Alert::toast(session('success'), 'success');
            }

            return redirect()->route('survey.details', encrypt($id));
        } catch (\Exception $e) {
            session()->flash('error', 'ops! Ocorreu algum erro durante o processo');
            if (session('error')) {
                Alert::toast(session('error'), 'error');
            }
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }


    public function survey_register_save(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'question' => 'required',
                "options"    => "required|array|min:2|max:10",
                'options.*' => 'required'
            ], [
                'question.required' => 'Campo Pergunta é de preenchimento obrigatório',
                'options.array.' => 'Campo Alternativas deve ser do tipo vetor',
                'options.require.' => 'Campo Alternativas são de preenchimentos obrigatórios',
                'options.*.require.' => 'Campo Alternativa é de preenchimento obrigatório',
                'options.max' => 'A pergunta deve ter no máximo 10 alternativas.',
                'options.min' => 'A pergunta deve ter no mínimo 2 alternativas.',
            ]);

            if ($validator->fails()) {
                session()->flash('error', 'Verifique os campos e tenta novamente');
                if (session('error')) {
                    Alert::toast(session('error'), 'error');
                }
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $question = [
                'user_id' => Auth::user()->id,
                'question' => $request->input('question'),
            ];

            $aux_question = Question::create($question);

            $options = $request->input('options');

            foreach ($options as $item) {
                $option = new Option();
                $option->question_id = $aux_question->id;
                $option->option = $item;
                $option->save();
            }

            $url = URL::signedRoute('survey.vote.form', ['id' => encrypt($aux_question->id)]);

            $question = Question::find($aux_question->id);
            $question->url = $url;
            $question->save();

            session()->flash('url', $url);
            session()->flash('success', 'Pergunta registada com sucesso.');
            if (session('success')) {
                Alert::toast(session('success'), 'success');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'ops! Ocorreu algum erro durante o processo');
            if (session('error')) {
                Alert::toast(session('error'), 'error');
            }
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function survey_delete(Request $request)
    {
        try {
            $id = $request->input('id');

            DB::table('questions')->where('id', $id)->delete();

            session()->flash('warning', 'Pergunta removida com sucesso');
            if (session('warning')) {
                Alert::toast(session('warning'), 'warning');
            }

            return redirect()->route('survey.mine');
        } catch (\Exception $e) {
            session()->flash('error', 'ops! Ocorreu algum erro durante o processo');
            if (session('error')) {
                Alert::toast(session('error'), 'error');
            }
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function survey_option_delete($id)
    {
        try {
            $id = decrypt($id);
            $question_id = Option::where('id', $id)->first()->question_id;

            $tams = Option::where('question_id', $question_id)->count();

            if ($tams > 2) {
                DB::table('options')->where('id', $id)->where('question_id', $question_id)->delete();
                session()->flash('warning', 'Alternativa removida com sucesso');
                if (session('warning')) {
                    Alert::toast(session('warning'), 'warning');
                }
                return redirect()->route('survey.details', encrypt($question_id));
            }

            session()->flash('warning', 'Pergunta não pode ter menos de 2 alternativas');
            if (session('warning')) {
                Alert::toast(session('warning'), 'warning');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'ops! Ocorreu algum erro durante o processo');
            if (session('error')) {
                Alert::toast(session('error'), 'error');
            }
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
