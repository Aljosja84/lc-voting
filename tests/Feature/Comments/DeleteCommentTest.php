<?php

namespace Tests\Feature\Comments;

use App\Http\Livewire\DeleteComment;
use App\Http\Livewire\EditComment;
use App\Http\Livewire\EditIdea;
use App\Http\Livewire\IdeaComment;
use App\Http\Livewire\IdeaShow;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteCommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function shows_delete_comment_livewire_component_when_user_has_auth()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('delete-comment');
    }

    /** @test */
    public function does_not_show_delete_comment_livewire_component_when_user_does_not_have_auth()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $this
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('delete-comment');
    }

    /** @test */
    public function delete_comment_is_set_correctly_when_user_clicks_it_from_menu()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'body'
        ]);

        Livewire::actingAs($user)
            ->test(DeleteComment::class)
            ->call('setDeleteComment', $comment->id)
            ->assertEmitted('deleteCommentWasSet');
    }

        /** @test */
    public function deleting_a_comment_works_when_user_has_authorization()
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'This is my first comment',
        ]);

        Livewire::actingAs($user)
            ->test(DeleteComment::class)
            ->call('setDeleteComment', $comment->id)
            ->assertEmitted('deleteCommentWasSet')
            ->call('deleteComment')
            ->assertEmitted('commentWasDeleted');

            //->assertEmitted('successNotify');
        $this->assertDatabaseMissing('comments', ['comment' => $comment]);
    }

    /** @test */
    public function deleting_a_comment_does_not_work_when_user_does_not_have_auth()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        Livewire::actingAs($userB)
            ->test(DeleteComment::class)
            ->call('setDeleteComment', $comment->id)
            ->call('deleteComment')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function deleting_a_comment_does_not_work_when_comment_is_not_written_by_logged_in_user()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'body'
        ]);

        Livewire::actingAs($userB)
            ->test(DeleteComment::class)
            ->call('setDeleteComment', $comment->id)
            ->call('deleteComment')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function deleting_a_comment_shows_on_menu_when_user_has_auth()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'body'
        ]);

        Livewire::actingAs($user)
            ->test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id
            ])
            ->assertSee('Delete Comment');

    }

    /** @test */
    public function deleting_a_comment_shows_not_on_menu_when_user_has_no_auth()
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'body'
        ]);

        Livewire::actingAs($userB)
            ->test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id
            ])
            ->assertDontSee('Delete Comment');
    }
}
