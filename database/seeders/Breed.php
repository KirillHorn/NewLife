<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Breed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date=Carbon::now();
        DB::table('breeds')->insert([
        ['title'=>'Кот', 'created_at'=>$date, 'updated_at'=>$date],
        ['title'=>'Собака', 'created_at'=>$date, 'updated_at'=>$date],
        ['title'=>'Тушкан', 'created_at'=>$date, 'updated_at'=>$date],
        ['title'=>'Хомяк', 'created_at'=>$date, 'updated_at'=>$date],
        ['title'=>'Поро', 'created_at'=>$date, 'updated_at'=>$date],
        ]);
    }
}
