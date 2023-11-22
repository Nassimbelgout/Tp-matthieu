<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Weightclass;
use Database\Factories\FighterFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     
     * Seed the application's database.
     */
    public function run(): void
    {

        Weightclass::factory()->create([
            'name'=> 'lightweight'

        ]);
        Weightclass::factory()->create([
            'name'=> 'welterweight'

        ]);
        Weightclass::factory()->create([
            'name'=> 'heavyweight'

        ]);
        Weightclass::factory()->create([
            'name'=> 'middleweightweight'

        ]);


        

       
      
       //FILMS


      

    //    FighterFactory::factory()->create([
    //     'weightclass' =>$weightclasses['weightclass'],
        
    //     'user_id' => Weightclass::all()->random(),
    //    ]);
       
      

       }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

