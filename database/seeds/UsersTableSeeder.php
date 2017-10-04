<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Categories
        factory(App\Category::class, 15)->create();
        $categories = App\Category::all('id')->pluck('id')->toArray();

        //Create Users
        factory(App\User::class, 50)->create()->each(function($user) use ($categories) {
          $schematic = factory(App\Schematic::class)->make();
          $schematic->category_id = $categories[array_rand($categories)];
          $user->schematics()->save($schematic);
        });
    }
}
