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
        //  
        /**
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id1c` int(10) UNSIGNED NOT NULL,
  `articul` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `mgroup_id` bigint(20) UNSIGNED NOT NULL,
  `specifications` bigint(20) UNSIGNED NOT NULL,
  `metal` bigint(20) UNSIGNED NOT NULL,
  `trymetal` bigint(20) UNSIGNED NOT NULL,
  `descr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
         */

        // INSERT INTO `catalog` (`id1c`,  `articul`, `size`, `mgroup_id`, `specifications`, `metal`, `trymetal`, `descr`, `img`, `name`, `reviewCount`, `ratingValue`) VALUES
        $cNames = [];
        $cols = ['id1c','articul','size','mgroup_id','specifications','metal','trymetal','descr','img','name', 'fullname', 'balance'];
        $cNames[] = [546592,'К323-3', 2, 1,19,1,585,'Бриллиант', 'no-image.png','К323-3/16 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [546056,'95702',  3, 1,19,1,585,'с брил.', 'no-image.png','95702 Крест с брил. (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [74721,'770703',  1, 1, 19, 1, 585,'Бриллиант','12/1/19/74721.jpg','770703/16 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [74729, '770704', 2, 1, 19, 1, 585, 'Бриллиант', '12/1/19/74729.jpg','770703/20.5 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [74724, '770705', 1, 2, 19, 1, 585, 'Бриллиант', '12/1/19/74724.jpg','770703/18 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [262443, '775716',3, 3, 19, 1, 585, 'с брил.', '13/1/19/262443.jpg','775716 Крест с брил. (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [285750,'75701',  3, 3, 19, 1, 585, 'с брил.', 'no-image.png','75701 Крест с брил. (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [285622,'75720',  3, 3, 19, 1, 585, 'с брил.', '13/1/19/285622.jpg','75720 Крест с брил. (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [74731,'770706',  7, 4, 19, 1, 585, 'Бриллиант', '12/1/19/74731.jpg','770703/21.5 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [74723,'770707',  6, 5, 19, 1, 585, 'Бриллиант', '12/1/19/74723.jpg','770703/17.5 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [74725,'770708',  5, 4, 19, 1, 585, 'Бриллиант', '12/1/19/74725.jpg','770703/18.5 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $cNames[] = [159963,'770709', 7, 4, 19, 1, 585, 'Бриллиант', '12/1/19/159963.jpg','770703/23 Кольцо Бриллиант (золото 585°)', 'К323-3/16 Кольцо Бриллиант (золото 585°)',1];
        $catalogs = [];
        for ($i = 0; $i < sizeof($cNames); $i++) {
            $catalog_row = [];
            for($j=0;$j<sizeof($cols);$j++){
                $catalog_row[$cols[$j]]=$cNames[$i][$j];
            }
            $catalog_row['created_at'] = date("Y-m-d H:i:s");
            $catalog_row['updated_at'] = date("Y-m-d H:i:s");
            $catalogs[] = $catalog_row;
        }
        \DB::table('catalogs')->insert($catalogs);
    }
}
