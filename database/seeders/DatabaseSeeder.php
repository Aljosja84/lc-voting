<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $numberIdeas = 5;
        // make myself a user first
        User::factory()->create([
           'name' => 'Gabriel',
           'email' => 'gabriel@gressie.net'
        ]);
        // followed by 19 other, random users
        User::factory(19)->create();
        // we will hardcode 5 statuses
        Status::factory()->create(['name' => 'Open']);
        Status::factory()->create(['name' => 'Considering']);
        Status::factory()->create(['name' => 'In Progress']);
        Status::factory()->create(['name' => 'Implemented']);
        Status::factory()->create(['name' => 'Closed']);
        // we will hardcode 4 categories
        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        // \App\Models\User::factory(10)->create();
        Idea::factory($numberIdeas)->existing()->create();

        // generate unique votes
        foreach (range(1,20) as $user_id) {
            foreach (range(1, $numberIdeas) as $idea_id) {
                if($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id
                    ]);
                }
            }
        }

        // Generate comments for ideas
        foreach(Idea::all() as $idea) {
            Comment::factory(5)->existing()->create(['idea_id' => $idea->id]);
        }
    }
}
