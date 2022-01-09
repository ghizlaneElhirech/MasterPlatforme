<?php

use App\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'fr'=> 'arabe'],
            ['en'=> 'Sciences', 'fr'=> 'sc'],
            ['en'=> 'Computer', 'fr'=> 'info'],
            ['en'=> 'English', 'fr'=> 'anglais'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}