<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
         $this->call(ThanTableSeeder::class);
         $this->call(LookingTableSeeder::class);
         $this->call(JobTableSeeder::class);
    }
}

class ThanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('than')->insert([
            array('name'=>'A', 'cate_id'=>'1'),
            array('name'=>'B', 'cate_id'=>'2'),
            array('name'=>'C', 'cate_id'=>'3'),
            array('name'=>'D', 'cate_id'=>'4')
        ]);
    }
}

class LookingTableSeeder extends Seeder
{
    public function run(){
        DB::table('looking')->insert([
            array('look'=>'tall', 'look_id'=>'1'),
            array('look'=>'fat', 'look_id'=>'2'),
            array('look'=>'thin', 'look_id'=>'4'),
            array('look'=>'lean', 'look_id'=>'2'),
            array('look'=>'so fat', 'look_id'=>'3'),
        ]);
    }
}

class JobTableSeeder extends Seeder
{
    public function run(){
        DB::table('job')->insert([
            array('job'=>'IT', 'job_id'=>'1'),
            array('job'=>'Teacher', 'job_id'=>'2'),
            array('job'=>'Assitant', 'job_id'=>'4'),
            array('job'=>'Engineer', 'job_id'=>'2'),
            array('job'=>'Leader', 'job_id'=>'3')
        ]);
    }
}
