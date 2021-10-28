<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];

    public function percentage($question, $user_id)
    {


        $question_id = $question->id;
        $options = Option::where('question_id', $question_id)->orderBy('id')->get();

        $data = [];

        foreach ($options as $i) {
            $percentage = 0;
            if (100 * $i->vote == 0 && $question->vote == 0) {
                $percentage = 0;
            } else {
                $percentage = round((100 * $i->vote) / $question->vote);
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

    public function show_vote_by_graphic($question, $user_id)
    {


        $question_id = $question->id;
        $options = Option::where('question_id', $question_id)->orderBy('id')->get();

        $data = [];

        foreach ($options as $i) {
            $percentage = 0;
            if (100 * $i->vote == 0 && $question->vote == 0) {
                $percentage = 0;
            } else {
                $percentage = round((100 * $i->vote) / $question->vote);
            }

            $option = [
                $i->option,
                $i->vote
            ];

            array_push($data, $option);
        }

        return $data;
    }
}
