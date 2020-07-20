<?php

use Illuminate\Database\Seeder;
use App\Models\Site;
use App\Models\Salary;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
		$sites = collect(Site::all()->modelKeys());
		
		for($i = 0; $i < 50000; $i++){
			$data[] = [
				'site_id'	=>	$sites->random(),
				'name' => str_random(10),
				'email' => str_random(5).'@gmail.com',
				'salary'	=> rand(1000,50000),
				'created_at'	=> now()->toDateTimeString(),
				'updated_at'	=> now()->toDateTimeString(),
			];
		}
		
		$chunks = array_chunk($data, 5000);
		foreach($chunks as $chunk){
			Salary::insert($chunk);
		}
    }
}
