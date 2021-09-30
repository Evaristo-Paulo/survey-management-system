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
        Question::create([
            'question' => 'Qual é a forma mais produtiva de trabalho?',
            'user_id' => 1,
            'vote' => 2,
            'url' => URL::signedRoute('survey.vote.form', ['id' => encrypt(1)])
        ]);
        Question::create([
            'question' => 'Qual é a tua linguagem de programação favorita?',
            'user_id' => 1,
            'url' => URL::signedRoute('survey.vote.form', ['id' => encrypt(2)])
        ]);
        Question::create([
            'question' => 'Quem é o melhor jogador de futebol do mundo?',
            'user_id' => 1,
            'vote' => 15,
            'url' => URL::signedRoute('survey.vote.form', ['id' => encrypt(3)])
        ]);
        Question::create([
            'question' => 'Estás satisfeito com a sua vida financeira?',
            'user_id' => 2,
            'url' => URL::signedRoute('survey.vote.form', ['id' => encrypt(4)])
        ]);
        Question::create([
            'question' => 'Com qual frequência programas?',
            'user_id' => 2,
            'vote' => 2,
            'url' => URL::signedRoute('survey.vote.form', ['id' => encrypt(5)])
        ]);
    }
}
