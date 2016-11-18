<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(CategoryTable::class);
        $this->call(ArticleTable::class);
        $this->call(ACLTables::class);
    }
}
