<?php

use Illuminate\Database\Seeder;
use App\User;

class CandidateTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        // $users->each(function ($user){
        //     factory(\App\Candidate::class, 1)->create([
        //         'user_id' =>$user->id
        //     ]);
        // });
    }
}
