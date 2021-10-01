<?php

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = Question::create([
            'question' => 'Qual é a forma mais produtiva de trabalho?',
            'user_id' => 1,
            'vote' => 2,
        ]);
        $question->url = URL::signedRoute('survey.vote.form', ['id' => encrypt($question->id)]);
        $question->save();

        $question = Question::create([
            'question' => 'Qual é a tua linguagem de programação favorita?',
            'user_id' => 1,
        ]);
        $question->url = URL::signedRoute('survey.vote.form', ['id' => encrypt($question->id)]);
        $question->save();

        $question = Question::create([
            'question' => 'Quem é o melhor jogador de futebol do mundo?',
            'user_id' => 1,
            'vote' => 15,
        ]);
        $question->url = URL::signedRoute('survey.vote.form', ['id' => encrypt($question->id)]);
        $question->save();

        $question = Question::create([
            'question' => 'Estás satisfeito com a sua vida financeira?',
            'user_id' => 2,
            'url' => URL::signedRoute('survey.vote.form', ['id' => encrypt(4)])
        ]);
        $question->url = URL::signedRoute('survey.vote.form', ['id' => encrypt($question->id)]);
        $question->save();

        $question = Question::create([
            'question' => 'Com qual frequência programas?',
            'user_id' => 2,
            'vote' => 2,
        ]);
        $question->url = URL::signedRoute('survey.vote.form', ['id' => encrypt($question->id)]);
        $question->save();
    }
}
