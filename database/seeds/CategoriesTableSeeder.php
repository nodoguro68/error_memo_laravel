<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'Sass'],
            ['name' => 'JavaScript'],
            ['name' => 'jQuery'],
            ['name' => 'Vue.js'],
            ['name' => 'React'],
            ['name' => 'TypeScript'],
            ['name' => 'Nuxt.js'],
            ['name' => 'Next.js'],
            ['name' => 'PHP'],
            ['name' => 'Laravel'],
            ['name' => 'CakePHP'],
            ['name' => 'FuelPHP'],
            ['name' => 'Java'],
            ['name' => 'Scala'],
            ['name' => 'Go'],
            ['name' => 'Python'],
            ['name' => 'Diango'],
            ['name' => 'DB'],
            ['name' => 'MySQL'],
            ['name' => 'MariaDB'],
            ['name' => 'SQL'],
            ['name' => 'Docker'],
            ['name' => 'AWS'],
            ['name' => 'Git'],
            ['name' => 'Github'],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('categories')->insert($param);
        }
    }
}
