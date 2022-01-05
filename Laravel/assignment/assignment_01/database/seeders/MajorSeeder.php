<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MajorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $majors = ['English', 'Math', 'Physics', 'Chemistry', 'Computer Science', 'Law'];
        foreach($majors as $major) {
            DB::table('majors')->insert(
                [
                    'name' => "$major"
                ]
            );
        }
    }
}
