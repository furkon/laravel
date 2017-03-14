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
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }

}


class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => str_random(10),
            'description' => str_random(10).' bhan katun',
            'price' => 40000,
            'stok' => 50,
        ]);

        DB::table('products')->insert([
            'name' => 'kue ape',
            'description' => str_random(10).' kue basah',
            'price' => 500,
            'stok' => 100,
        ]);
    }
}
