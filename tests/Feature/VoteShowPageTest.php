<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VoteShowPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_show_page_contains_idea_show_livewire_component()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
           'user_id' => $user->id,
           'category_id' => $category->id,
           'status_id' => $status->id,
           'title' => 'My idea',
           'description' => 'description'
        ]);

        $this->get(route('idea.show', $idea))
             ->assertSuccessful()
             ->assertSeeLivewire('idea-show');
    }

    /** @test */
    public function the_show_page_correctly_receiver_votes_count()
    {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        // voting time for user and anotherUser
        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);
        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $anotherUser->id
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSuccessful()
            ->assertViewHas('votesCount', 2);
    }


}
