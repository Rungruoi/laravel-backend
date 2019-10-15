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
                'deadline' => now(),
                'type' => rand(1, 3),
                'status' => rand(1, 2),
                ];
            $project[] = $item;
        }

        DB::table('projects')->insert($project);
    }
}
