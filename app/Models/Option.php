<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];

    public function percentage ($question, $user_id){
        

        $question_id = $question->id;
        $options = DB::table('options')
        ->join('questions', function ($join) use ($question_id) {
            $join->on('options.question_id', '=', 'questions.id')
                ->where([['questions.id', '=', $question_id]]);
        })
        ->select('options.*')
        ->get();

        $data = [];

        foreach ($options as $i) {
            $percentage = 0;
            if(100 * $i->vote == 0 && $question->vote == 0){
                $percentage = 0;
            } else{
                $percentage = round((100 * $i->vote)/$question->vote);
            }

            $option = [
                'id' => $i->id,
                'vote' => $i->vote,
                'percentage' => $percentage,
                'option' => $i->option,
                'question_id' => $i->question_id,
            ];

            array_push($data, $option);
        }

        return $data;
    }
}
