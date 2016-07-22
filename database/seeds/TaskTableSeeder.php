<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tasks')->insert([
    		'project_id'=>1,
    		'user_id'=>2,
    		'index'=>1,
    		'name'=>'Scheduling project',
    		'target_start_datetime'=>date('2016-03-12 00:00:00'),
    		'target_end_datetime'=>date('2016-03-12 00:00:00'),
    	]);
    	DB::table('tasks')->insert([
    		'project_id'=>1,
    		'user_id'=>2,
    		'index'=>2,
    		'name'=>'Delivery task',
    		'target_start_datetime'=>date('2016-03-12 00:00:00'),
    		'target_end_datetime'=>date('2016-03-12 00:00:00'),
    	]);
    	DB::table('tasks')->insert([
    		'project_id'=>1,
    		'user_id'=>3,
    		'index'=>3,
    		'name'=>'Design Database',
    		'target_start_datetime'=>date('2016-03-12 00:00:00'),
    		'target_end_datetime'=>date('2016-03-12 00:00:00'),
    	]);
    	DB::table('tasks')->insert([
    		'project_id'=>1,
    		'user_id'=>3,
    		'index'=>3,
    		'name'=>'Development',
    		'target_start_datetime'=>date('2016-03-12 00:00:00'),
    		'target_end_datetime'=>date('2016-03-12 00:00:00'),
    	]);
        DB::table('tasks')->insert([
            'project_id'=>1,
            'user_id'=>3,
            'index'=>3,
            'name'=>'Buy a cigarette',
            'target_start_datetime'=>date('2016-03-12 00:00:00'),
            'target_end_datetime'=>date('2016-03-12 00:00:00'),
        ]);
        DB::table('tasks')->insert([
            'project_id'=>1,
            'user_id'=>3,
            'index'=>3,
            'name'=>'Make a coffee',
            'target_start_datetime'=>date('2016-03-12 00:00:00'),
            'target_end_datetime'=>date('2016-03-12 00:00:00'),
        ]);
    	DB::table('tasks')->insert([
    		'project_id'=>1,
    		'user_id'=>4,
    		'index'=>4,
    		'name'=>'Testing App',
    		'target_start_datetime'=>date('2016-03-12 00:00:00'),
    		'target_start_datetime'=>date('2016-03-12 00:00:00'),
    	]);
    	DB::table('tasks')->insert([
    		'project_id'=>1,
    		'user_id'=>4,
    		'index'=>5,
    		'name'=>'UAT',
    		'target_start_datetime'=>date('2016-03-12 00:00:00'),
    		'target_end_datetime'=>date('2016-03-12 00:00:00'),
    	]);
    }
}
