<?php

use Illuminate\Database\Seeder;

// @codingStandardsIgnoreLine
class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = [];
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $item = [
                'name' => $faker->name(),
                'information' => $faker->email(),
                'phone_number' => '0393079176',
                'date_of_birth' => now(),
                'avatar' => $faker->image(
                    "public/images/",
                    $width = 480,
                    $height = 640,
                    'people',
                    false
                ),
                'position' => rand(1, 7),
                'gender' => rand(1, 2),
            ];
            $member[] = $item;
        }

        DB::table('members')->insert($member);
    }
}
