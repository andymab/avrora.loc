<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [];
        $cNames = ['Близнецы','Весы', 'Владимирская б.м.',
'М.орел','Пантелемон','Рак','Скорпион','х 10 фианит',
'х 149 фианит','х 36 фианит','х 8 фианит','Хризолит','12 х фианит',
'14 х фианит','16 х фианит','2 х фианит','26 х фианит',
'28 х фианит','30 х фианит','4 х фианит'];

        for ($i = 0; $i < sizeof($cNames); $i++) {
            $features[] = [
                'name' => $cNames[$i],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
        }
        \DB::table('features')->insert($features);
    }
}
