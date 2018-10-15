<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio omnis dolore, temporibus dolorem eum eius tempora, facilis! Ducimus laborum, repudiandae quod velit, consequuntur ea quos possimus perferendis, similique id eum.';

        DB::table('pages')->insert([
        	[
        		'label' => 'cgv',
        		'content' => "# Titre niveau 1 \n $lorem \n"
        	],
            [
                'label' => 'agence',
                'content' => '# Agence'
            ]
        ]);
    }
}
