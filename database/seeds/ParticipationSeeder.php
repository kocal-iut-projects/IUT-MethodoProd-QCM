<?php

use Illuminate\Database\Seeder;
use \App\Qcm;
use \App\Participation;
use App\User;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $qcms  = Qcm::all();

        foreach ($users as $user) {
            if ($user->id == 0) {
                continue;
            }

            foreach ($qcms as $qcm) {

                foreach ($qcm->questions as $question) {
                    $answers = $question->answers;

                    Participation::create(
                        [
                            'user_id'     => $user->id,
                            'question_id' => $question->id,
                            'answer_id'   => $answers->random()->id,
                            'qcm_id'      => $qcm->id,
                        ]
                    );
                }
            }
        }
    }
}
