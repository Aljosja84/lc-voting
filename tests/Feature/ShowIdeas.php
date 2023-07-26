<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeas extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function list_of_ideas_shows_on_main_page()
    {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $firstIdea = Idea::factory()->create([
            'title' => 'first idea title',
            'category_id' => $categoryOne->id,
            'description' => 'first idea description'
        ]);

        $secondIdea = Idea::factory()->create([
            'title' => 'second idea title',
            'category_id' => $categoryTwo->id,
            'description' => 'second idea description'
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($firstIdea->title);
        $response->assertSee($secondIdea->title);
        $response->assertSee($categoryOne->name);
        $response->assertSee($categoryTwo->name);
    }

    /** @test */
    public function single_idea_shows_on_show_page()
    {
        $idea = Idea::factory()->create([
            'title' => 'first idea title',
            'description' => 'first idea description'
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
    }
}
