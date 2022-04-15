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

        /**
         * INSERT INTO `mgroup` (`id`, `en_name`, `mname`, `name`, `descr`, `img`, `amt`) VALUES
         */
        $cols = ['id', 'en_name', 'mname', 'name', 'descr', 'img'];

        $cNames[] = [1,'Bracelet', 'Браслет', 'Браслеты', 'Браслет', 'art_77021_w12.22.jpg'];
        $cNames[] = [2,'Trinket', 'Брелок', 'Брелки', 'Брелок', 'art_74312_w4.32.jpg'];
        $cNames[] = [3,'Brooch', 'Брошь', 'Броши', 'Брошь', 'art_75010_w3.51.jpg'];
        $cNames[] = [4,'Pin', 'Булавка', 'Булавки', 'Булавка', 'art_94130_w2.63.jpg'];
        $cNames[] = [5,'Clamp', 'Зажим', 'Зажимы', 'Зажим', 'art_74127_w3.98.jpg'];
        $cNames[] = [6,'Barrette', 'Заколка', 'Заколки', 'Заколка', 'art_74124_w1.63.jpg'];
        $cNames[] = [8,'Cufflinks', 'Запонки', 'Запонки', 'Запонки', 'art_74231_w7.05.jpg'];
        $cNames[] = [9,'badge', 'Значок', 'Значки', 'Значок', 'art_84478%20w_1.18.jpg'];
        $cNames[] = [10,'Necklace', 'Колье', 'Колье', 'Колье', 'art_76003_50_w1.3.jpg'];
        $cNames[] = [11,'Annulus', 'Кольцо', 'Кольца', 'Кольцо', 'art_71010_w5.43.jpg'];
        $cNames[] = [12,'Sross', 'Крест', 'Крест', 'Крестики', 'art_74018_w2.9.jpg'];
        $cNames[] = [13,'Spoon', 'Ложка', 'Ложка', 'Ложка', 'art_84062_w3.07.jpg'];
        $cNames[] = [14,'Piercings', 'Пирсинг', 'Пирсинг', 'Пирсинг', 'art_75075_w0,18.jpg'];
        $cNames[] = [15,'Pendant', 'Подвеска', 'Подвеска', 'Подвески', 'art_74003_w1.15.jpg'];
        $cNames[] = [16,'Earring', 'Серьги', 'Серьги', 'Серьги', 'art_83703 w_2.77.jpg'];
        $cNames[] = [17,'Souvenir', 'Сувенир', 'Сувениры', 'Сувенир', 'art_84516_w3,21.jpg'];
        $cNames[] = [18,'Flash_drive', 'Флешка', 'Флешки', 'Флешка', 'art_74402_w5.7.jpg'];
        $cNames[] = [19,'Chain', 'Цепь', 'Цепи', 'Цепь', 'art_76020_50_w45.jpg'];
        $cNames[] = [20,'Rosary', 'Четки', 'Четки', 'Четки', 'art_87035_w24.96.jpg'];
        $cNames[] = [21,'notfind', 'хНеразобраны', 'хНе разобраны', 'Не разобранные изделия, новые изделия, которые только готовятся к продаже', 'volshebnick.svg'];

        $catalogs = [];
        for ($i = 0; $i < sizeof($cNames); $i++) {
            $catalog_row = [];
            for ($j = 0; $j < sizeof($cols); $j++) {
                $catalog_row[$cols[$j]] = $cNames[$i][$j];
            }
            $catalog_row['created_at'] = date("Y-m-d H:i:s");
            $catalog_row['updated_at'] = date("Y-m-d H:i:s");
            $catalogs[] = $catalog_row;
        }
        \DB::table('mgroups')->insert($catalogs);
    }
}
