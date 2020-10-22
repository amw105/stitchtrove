<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App;
use App\Models\User;
use App\Models\Project;
use Faker\Factory as Faker;
use DB;
use App\Imports\ProjectImport;
use Maatwebsite\Excel\Facades\Excel;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // if (App::environment() === 'production'){
        //     exit('Nope, you definitely cannot do this here!');
        // }


        $tables =[
            'users',
            'projects'
        ];

        foreach ($tables as $table){
            DB::table($table)->truncate();
        }

        $faker = Faker::create();

        //for ($i = 0; $i < 10; $i++) {
        //     User::create([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'active' => $i === 0 ? true : $faker->boolean,
        //         'birthday' => $faker->dateTimeBetween('-40 years', '-18 years'),
        //         'location' => $faker->city,
        //         'avatar' => $faker->randomLetter,
        //         'password' => $faker->password
        //     ]);

        // }

        Excel::import(new ProjectImport, 'public/storage/imports/projects.csv');

    }
}
