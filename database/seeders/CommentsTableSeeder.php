<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Comment::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 250; $i++) {
            $c = new Comment();
            $c->body = $faker->text(255);
            $c->user_id = User::where('name', '!=', 'administrator')->get()->random()->id;
            $c->article_id = Article::all()->random()->id;
            $c->save();
        }
    }
}
