<?php

namespace Tests\Feature;

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
        $firstIdea = Idea::factory()->create([
            'title' => 'first idea title',
            'description' => 'first idea description'
        ]);

        $secondIdea = Idea::factory()->create([
            'title' => 'second idea title',
            'description' => 'second idea description'
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($firstIdea->title);
        $response->assertSee($secondIdea->title);
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
