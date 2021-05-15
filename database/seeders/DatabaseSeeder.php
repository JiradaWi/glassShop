<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('client')->insert([
            'firstName' =>'Tony',
            'lastName' =>'Woodsome',
            'birthDate' =>'1970-02-12',
            'contactNo' =>'0845620310',
            'currentLevel' =>'1'
        ]);

        \DB::table('customerLevel')->insert([
            'levelName' =>'Silver',
            'remark' =>'new customer'           
        ]);

        \DB::table('customerLevel')->insert([
            'levelName' =>'Gold',
            'remark' =>'my favorite customer'           
        ]);

        \DB::table('customerLevel')->insert([
            'levelName' =>'Platinum',
            'remark' =>'rich!'           
        ]);

        \DB::table('orderStatus')->insert([
            'statusName' =>'New',
            'remark' =>''           
        ]);
        \DB::table('orderStatus')->insert([
            'statusName' =>'Processing',
            'remark' =>''           
        ]);
        \DB::table('orderStatus')->insert([
            'statusName' =>'Done',
            'remark' =>''           
        ]);
        \DB::table('orderStatus')->insert([
            'statusName' =>'Cancelled',
            'remark' =>''           
        ]);
    }
}
