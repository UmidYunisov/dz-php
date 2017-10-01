<?php

use App\Good;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FakeGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        for ($i=0; $i < 30 ; $i++)
        { 
            $good = new Good();
            $faker = \Faker\Factory::create();
            $good->name = $faker->name;
            $good->price = rand(0,10000);
            $good->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
