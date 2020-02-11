<?php

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'type' => 'level_1',
        		'value' => '3',
        		'cal_value' => '3',
        		'label' => 'Level 1',
        	],[
        		'type' => 'level_2',
        		'value' => '9',
        		'cal_value' => '3',
        		'label' => 'Level 2',
        	],[
        		'type' => 'level_3',
        		'value' => '27',
        		'cal_value' => '3',
        		'label' => 'Level 3',
        	],[
        		'type' => 'level_4',
        		'value' => '9',
        		'cal_value' => '3',
        		'label' => 'Level 4',
        	],[
        		'type' => 'level_5',
        		'value' => '243',
        		'cal_value' => '3',
        		'label' => 'Level 5',
        	],[
        		'type' => 'level_6',
        		'value' => '729',
        		'cal_value' => '3',
        		'label' => 'Level 6',
        	],[
        		'type' => 'level_7',
        		'value' => '2181',
        		'cal_value' => '3',
        		'label' => 'Level 7',
        	],[
        		'type' => 'level_8',
        		'value' => '6561',
        		'cal_value' => '3',
        		'label' => 'Level 8',
        	],[
        		'type' => 'level_9',
        		'value' => '19683',
        		'cal_value' => '3',
        		'label' => 'Level 9',
        	],[
        		'type' => 'level_10',
        		'value' => '59049',
        		'cal_value' => '3',
        		'label' => 'Level 10',
        	],[
        		'type' => 'level_11',
        		'value' => '177147',
        		'cal_value' => '3',
        		'label' => 'Level 11',
        	],[
        		'type' => 'level_12',
        		'value' => '531441',
        		'cal_value' => '3',
        		'label' => 'Level 12',
        	],[
        		'type' => 'level_13',
        		'value' => '1594323',
        		'cal_value' => '3',
        		'label' => 'Level 13',
        	],[
        		'type' => 'level_14',
        		'value' => '4782969',
        		'cal_value' => '3',
        		'label' => 'Level 14',
        	],[
        		'type' => 'level_15',
        		'value' => '14348',
        		'cal_value' => '3',
        		'label' => 'Level 15',
        	]

        ];

        collect($data)->each(function($level){
        	Option::insert($level);
        });
    }
}
