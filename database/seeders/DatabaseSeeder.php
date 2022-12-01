<?php

namespace Database\Seeders;

use App\Models\Listing;
use Database\Factories\ListingFactory;
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
        // \App\Models\User::factory(5)->create();
         Listing::factory(5)->create();
        // Listing::create([

        //     'title'=> 'laravel developer',
        //     'tags'=>'laravel ,js',
        //     'company'=>'javra software',
        //     'location'=>'nakkhu',
        //     'email' => 'kshitiz323',
        //     'website' =>'www.javara.com',
        //     'description'=>'malai ekdum khusi laako xa'
        // ]);

        // Listing::create([

        //     'title'=> 'python developer',
        //     'tags'=>'laravel ,python',
        //     'company'=>'javra software',
        //     'location'=>'nakkhu',
        //     'email' => 'kshitiz323',
        //     'website' =>'www.javara.com',
        //     'description'=>'malai ekdum khusi laako xa'
        // ]);

    }
}
