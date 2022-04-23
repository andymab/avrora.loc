<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CatalogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = \Storage::disk('data')->get('catalog2000.json');
        $features = json_decode($cont, 1);
        \DB::table('catalogs')->insertOrIgnore(array_map([$this, 'update_rows'], $features));

        $cont = \Storage::disk('data')->get('catalogEND.json');
        $features = json_decode($cont, 1);
        \DB::table('catalogs')->insertOrIgnore(array_map([$this, 'update_rows'], $features));
    }

    private function update_rows($array)
    {
        $array['created_at'] = date("Y-m-d H:i:s");
        $array['updated_at'] = date("Y-m-d H:i:s");
        unset($array['mimg']);
        unset($array['ratingValue']);
        unset($array['reviewCount']);
        unset($array['show_item']);
        return $array;
    }
}
