<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeas extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function list_of_ideas_shows_on_main_page()
    {
        $user = User::factory()->create();
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $statusOne = Status::factory()->create(['name' => 'Open']);
        $statusTwo = Status::factory()->create(['name' => 'Closed']);

        $firstIdea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'first idea title',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOne->id,
            'description' => 'first idea description'
        ]);

        $secondIdea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'second idea title',
            'category_id' => $categoryTwo->id,
            'status_id' => $statusTwo->id,
            'description' => 'second idea description'
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        // check if we see titles
        $response->assertSee($firstIdea->title);
        $response->assertSee($secondIdea->title);
        // check if we see statuses
        $response->assertSee($statusOne->name);
        $response->assertSee($statusTwo->name);
        // check if we see categories
        $response->assertSee($categoryOne->name);
        $response->assertSee($categoryTwo->name);
    }

    /** @test */
    public function single_idea_shows_on_show_page()
    {
        $user = User::factory()->create();
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOne = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'first idea title',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOne->id,
            'description' => 'first idea description'
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
    }
}
