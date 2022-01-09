<?php

use App\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();

        $genders = [
            ['en'=> 'Male', 'fr'=> 'homme'],
            ['en'=> 'Female', 'fr'=> 'femme'],

        ];
        foreach ($genders as $ge) {
            Gender::create(['Name' => $ge]);
        }
    }
}