<?php

use App\Blogs\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 5) as $make)
        {
        	Category::create([
        		'title' => $make.' Lorem ipsum dolor sit amet',
        		'description' => $make.' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, inventore.',
        		'display_order' => $make,
        	]);
        }
    }
}
