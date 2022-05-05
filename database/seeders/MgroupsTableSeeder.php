<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MgroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cont = \Storage::disk('data')->get('mgroup.json');
        $features = json_decode($cont, 1);
        \DB::table('mgroups')->insert(array_map([$this, 'update_rows'], $features));
    }

    private function update_rows($array)
    {
        $array['created_at'] = date("Y-m-d H:i:s");
        $array['updated_at'] = date("Y-m-d H:i:s");
        unset($array['amt']);
        unset($array['en_name']);
        unset($array['mname']);
        return $array;
    }
}
