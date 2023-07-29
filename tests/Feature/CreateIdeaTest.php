<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateIdea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function form_does_not_show_when_logged_out()
    {
        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee('You have to log in to create an idea!');
        $response->assertDontSee('Throw up an idea and let us discuss it!');
    }

    /** @test */
    public function form_does_show_when_logged_in()
    {
        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertDontSee('You have to log in to create an idea!');
        $response->assertSee('Throw up an idea and let us discuss it!');
    }

    /** @test */
    public function main_page_contains_create_idea_livewire_component()
    {
        $this->actingAs(User::factory()->create())
             ->get(route('idea.index'))
             ->assertSeeLivewire('create-idea');
    }

    /** @test */
    public function create_idea_form_validation_works()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'description'])
            ->assertSee('The title field is required');
    }
}

