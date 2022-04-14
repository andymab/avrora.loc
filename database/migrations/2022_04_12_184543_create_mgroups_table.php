<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *     
              CREATE TABLE IF NOT EXISTS `mgroup` (
                `id` int(11) NOT NULL,
                `en_name` varchar(60) NOT NULL,
                `mname` varchar(255) NOT NULL,
                `name` varchar(255) NOT NULL,
                `descr` text NOT NULL,
                `img` varchar(255) NOT NULL,
                `amt` int(11) NOT NULL,
                `created_at` NULL,
                `updated_at` NULL ->timestamp();
              ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
        });
     * @return void
     */
    public function up()
    {
        Schema::create('mgroups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('en_name')->unique();
            $table->string('mname')->unique();
            $table->string('name')->unique();
            $table->text('descr')->nullable();
            $table->string('img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mgroups');
    }
}
