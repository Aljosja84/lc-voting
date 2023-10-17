<?php

namespace Tests\Feature\Comments;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowCommentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function idea_comments_livewire_component_renders()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);
        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => 1,
            'status_id' => 1,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        $this
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('idea-comments');
    }

    /** @test */
    public function idea_comment_livewire_component_renders()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);
        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => 1,
            'status_id' => 1,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'text'
        ]);

        $this
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('idea-comment');
    }

    /** @test */
    public function idea_comment_livewire_component_does_not_render_when_no_comment()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);
        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => 1,
            'status_id' => 1,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        $this
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('idea-comment');
    }

    /** @test */
    public function list_of_comments_shows_on_the_idea_page()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);
        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => 1,
            'status_id' => 1,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        $commentOne = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'text'
        ]);

        $commentTwo = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'text1'
        ]);

        $this
            ->get(route('idea.show', $idea))
            ->assertSee($commentOne->body)
            ->assertSee($commentTwo->body)
            ->assertSee('2 comments');
    }

    /** @test */
    public function comments_count_shows_correctly_on_index_page()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,

        ]);

        $commentOne = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'text'
        ]);

        $commentTwo = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'text1'
        ]);

        $this
            ->get(route('idea.index'))
            ->assertSee('2 comments');
    }

    /** @test */
    public function OP_badge_shows_on_idea_page()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $commentOne = Comment::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id,
            'body' => 'text'
        ]);;

        $this
            ->get(route('idea.show', $idea))
            ->assertDontSee('OP');
    }
}
