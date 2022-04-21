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
        $cont = \Storage::disk('data')->get('feature.json');
        $features = json_decode($cont, 1);
        \DB::table('features')->insert(array_map([$this, 'update_rows'], $features));
    }

    private function update_rows($array)
    {
        $array['created_at'] = date("Y-m-d H:i:s");
        $array['updated_at'] = date("Y-m-d H:i:s");
        return $array;
    }
}
