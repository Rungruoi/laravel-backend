<?php

use Illuminate\Database\Seeder;

// @codingStandardsIgnoreLine
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = [];
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10 ; $i++) {
            $item = [
                'name' => $faker->name(),
                'information' => $faker->address(),
                'type' => random(1, 3),
                'status' => random(1, 2),
                ];
            $project[] = $item;
        }

        DB::table('projects')->insert($project);
    }
}
