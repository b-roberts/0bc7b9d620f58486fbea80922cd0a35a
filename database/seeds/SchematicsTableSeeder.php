<?php

use Illuminate\Database\Seeder;

class SchematicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Schematic::class, 50)->create();
    }
}
