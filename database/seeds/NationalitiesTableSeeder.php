
 <?php

use App\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();

        $nationals = [

            [
                'en'=> 'Afghan',
                'fr'=> 'Afghan',
            ],
           
            [

                'en'=> 'French',
                'fr'=> 'Francais',
            ],
            
            [

                'en'=> 'Moroccan',
                'fr'=> 'Marocain',
            ],
            [

            
                'en'=> 'Zimbabwean',
                'fr'=> 'Zimbabwean',
            ]
        ];

        foreach ($nationals as $n) {
            Nationalitie::create(['Name' => $n]);
        }

    }
}
    

