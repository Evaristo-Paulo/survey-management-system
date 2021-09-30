<?php

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::create([
            'option' => 'Home office',
            'question_id' => 1,
            'vote' => 2,
        ]);
        Option::create([
            'option' => 'Presencialmente',
            'question_id' => 1,
        ]);

        Option::create([
            'option' => 'C#',
            'question_id' => 2,
        ]);
        Option::create([
            'option' => 'Java',
            'question_id' => 2,
        ]);
        Option::create([
            'option' => 'Node JS',
            'question_id' => 2,
        ]);
        Option::create([
            'option' => 'PHP',
            'question_id' => 2,
        ]);
        Option::create([
            'option' => 'Python',
            'question_id' => 2,
        ]);
        Option::create([
            'option' => 'Outras',
            'question_id' => 2,
        ]);

        Option::create([
            'option' => 'Cristiano Ronaldo',
            'question_id' => 3,
            'vote' => 5,
        ]);
        Option::create([
            'option' => 'Leonel Messi',
            'question_id' => 3,
            'vote' => 7,
        ]);
        Option::create([
            'option' => 'Neymar Jr.',
            'question_id' => 3,
            'vote' => 3,
        ]);

        Option::create([
            'option' => 'Não',
            'question_id' => 4,
        ]);
        Option::create([
            'option' => 'Sim',
            'question_id' => 4,
        ]);
        Option::create([
            'option' => "'cês têm uma vida financeira? :D",
            'question_id' => 4,
        ]);

        Option::create([
            'option' => 'Sempre que posso',
            'question_id' => 5,
            'vote' => 1,
        ]);
        Option::create([
            'option' => 'Todos os dias',
            'question_id' => 5,
            'vote' => 1,
        ]);
        Option::create([
            'option' => '1 vez por semana',
            'question_id' => 5,
        ]);
        Option::create([
            'option' => '1 vez por mês',
            'question_id' => 5,
        ]);
        Option::create([
            'option' => 'Quando quero',
            'question_id' => 5,
        ]);
        
    }
}
