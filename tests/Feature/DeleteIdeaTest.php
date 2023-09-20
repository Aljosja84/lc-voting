<?php

namespace Tests\Feature;

use App\Http\Livewire\DeleteIdea;
use App\Http\Livewire\EditIdea;
use App\Http\Livewire\IdeaShow;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function shows_delete_idea_livewire_component_when_user_has_auth()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('delete-idea');
    }

    /** @test */
    public function deleting_an_idea_works_when_user_has_auth()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 2']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        Livewire::actingAs($user)
            ->test(DeleteIdea::class, [
                'idea' => $idea
            ])
            ->call('deleteIdea')
            ->assertRedirect(route('idea.index'));

        $this->assertEquals(0, Idea::count());

    }

    /** @test */
    public function deleting_an_idea_works_when_user_has_admin_priviledges()
    {
        $user = User::factory()->create([
            'email' => 'gabriel@gressie.net'
        ]);
        $userTwo = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 2']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $userTwo->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        Livewire::actingAs($user)
            ->test(DeleteIdea::class, [
                'idea' => $idea
            ])
            ->call('deleteIdea')
            ->assertRedirect(route('idea.index'));

        $this->assertEquals(0, Idea::count());

    }


    /** @test */
    public function deleting_an_idea_does_not_show_menu_when_user_has_no_auth()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $userB->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 10
            ])
            ->assertDontSee('Edit Idea');

    }
}
