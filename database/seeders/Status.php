<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Status extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date=Carbon::now();
        DB::table('statusses')->insert([
        ['title'=>'На модерации', 'created_at'=>$date, 'updated_at'=>$date],
        ['title'=>'Активно', 'created_at'=>$date, 'updated_at'=>$date],
        ['title'=>'Найдено', 'created_at'=>$date, 'updated_at'=>$date],
        ['title'=>'В архиве', 'created_at'=>$date, 'updated_at'=>$date],
        ]);
    }
}
