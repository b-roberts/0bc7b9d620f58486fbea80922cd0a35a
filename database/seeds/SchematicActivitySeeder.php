<?php

use Illuminate\Database\Seeder;

class SchematicActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $schematics = \App\Schematic::all('id')->pluck('id')->toArray();
        $users = \App\User::all('id')->pluck('id')->toArray();

        //Create Comments
        for ($i=0;$i<50;$i++)
        {
        factory(\App\Comment::class)->create([
          'user_id'=>$users[array_rand($users)],
          'schematic_id'=>$schematics[array_rand($schematics)]
        ]);
        factory(\App\Like::class)->create([
          'user_id'=>$users[array_rand($users)],
          'schematic_id'=>$schematics[array_rand($schematics)]
        ]);
      }
    }
}
