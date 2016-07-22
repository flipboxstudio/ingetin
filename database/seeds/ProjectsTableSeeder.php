<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('projects')->insert([
    		'name' => 'Hallo Nesia',
    		'target_start_datetime' => '2016-06-21 00:00:00',
    		'target_end_datetime' => '2016-10-22 00:00:00',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),            
    	]);

    	DB::table('projects')->insert([
    		'name' => 'Amplifia',
    		'target_start_datetime' => '2015-07-14 00:00:00',
    		'target_end_datetime' => '2016-02-22 00:00:00',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);

    	DB::table('projects')->insert([
    		'name' => 'Pazpo',
    		'target_start_datetime' => '2016-03-18 00:00:00',
    		'target_end_datetime' => '2016-08-12 00:00:00',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    }
}
