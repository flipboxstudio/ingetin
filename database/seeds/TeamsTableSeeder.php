<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//halloneisa
    	DB::table('teams')->insert([
    		'project_id' => 1,
    		'user_id' => 2,
    		'as' => 'Project Manager',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 1,
    		'user_id' => 3,
    		'as' => 'Developer',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 1,
    		'user_id' => 4,
    		'as' => 'Tester',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 1,
    		'user_id' => 3,
    		'as' => 'Management',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);

    	//amplifia
    	DB::table('teams')->insert([
    		'project_id' => 2,
    		'user_id' => 2,
    		'as' => 'Project Manager',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 2,
    		'user_id' => 3,
    		'as' => 'Developer',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 2,
    		'user_id' => 4,
    		'as' => 'Tester',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 2,
    		'user_id' => 3,
    		'as' => 'Management',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);

    	//amplifia
    	DB::table('teams')->insert([
    		'project_id' => 3,
    		'user_id' => 2,
    		'as' => 'Project Manager',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 3,
    		'user_id' => 3,
    		'as' => 'Developer',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 3,
    		'user_id' => 4,
    		'as' => 'Tester',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);
    	DB::table('teams')->insert([
    		'project_id' => 3,
    		'user_id' => 3,
    		'as' => 'Management',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    	]);

    }
}
