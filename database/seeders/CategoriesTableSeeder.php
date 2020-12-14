<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            "Soccer",
            "Basketball",
            "Sailing",
            "Rugby",
            "Badminton",
            "Tennis",
            "Running",
            "Hockey",
            "Canoeing",
            "Rowing"
        ];

        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'title' => $categories[$i]
            ]);
        }
    }
}
