<?php

namespace Database\Seeders;

use App\Models\CommentUserLike;
use Illuminate\Database\Seeder;

class CommentUserLikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommentUserLike::factory(150)->create();
    }
}
