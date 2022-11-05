<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      
       \DB::table('post')->delete();
        
        \DB::table('post')->insert(array (
            0 => 
            array (
                'id' => 9,
                'post_id'=>'5',
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'title' => 'Ademola',
                'description' => 'Lovely guy',
               
            ),
            1 => 
            array (
                'id' => 10,
                'post_id'=>'6',
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'title' => 'quozeem',
                'description' => 'naught guy',
            ),
            2 => 
            array (
                'id' => 11,
                'post_id'=>'7',
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'title' => 'lawal',
                'description' => 'crazy guy',
            ),
            3 => 
            array (
                'id' => 12,
                'post_id'=>'5',
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'title' => 'Ademola',
                'description' => 'Lovely guy',
               
            ),
            4=> 
            array (
                'id' => 13,
                'post_id'=>'6',
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'title' => 'quozeem',
                'description' => 'naught guy',
            ),
            5 => 
            array (
                'id' => 14,
                'post_id'=>'7',
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'title' => 'lawal',
                'description' => 'crazy guy',
            ),
            6 => 
            array (
                'id' => 15,
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'post_id'=>'5',
                'title' => 'Ademola',
                'description' => 'Lovely guy',
               
            ),
            7 => 
            array (
                'id' => 16,
                'post_id'=>'6',
                'email'=>'ade@gmail.com',
                'name'=>'qoztore',
                'title' => 'quozeem',
                'description' => 'naught guy',
            ),
          8 => 
            array (
                'id' => 17,
               'post_id'=>'7',
               'email'=>'ade@gmail.com',
               'name'=>'qoztore',
                'title' => 'lawal',
                'description' => 'crazy guy',
            ),
        ));
    }
}
