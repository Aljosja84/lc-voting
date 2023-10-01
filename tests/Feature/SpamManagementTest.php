<?php

namespace Tests\Feature;

use App\Http\Livewire\EditIdea;
use App\Http\Livewire\IdeaIndex;
use App\Http\Livewire\IdeaShow;
use App\Http\Livewire\IdeasIndex;
use App\Http\Livewire\MarkIdeaAsNotSpam;
use App\Http\Livewire\MarkIdeaAsSpam;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

class SpamManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function shows_mark_idea_as_spam_livewire_component_when_user_has_auth()
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
            ->assertSeeLivewire('mark-idea-as-spam');
    }

    /** @test */
    public function does_not_show_mark_idea_as_spam_when_user_does_not_have_auth()
    {
        $userB = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $userB->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-idea-as-spam');
    }

    /** @test */
    public function marking_an_idea_as_spam_works_when_user_has_auth()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        Livewire::actingAs($user)
            ->test(MarkIdeaAsSpam::class, [
                'idea' => $idea
            ])
            ->call('markAsSpam')
            ->assertEmitted('ideaWasMarkedAsSpam');

        $this->assertEquals(1, Idea::first()->spam_reports == 1);

    }

    /** @test */
    public function marking_an_idea_as_spam_does_not_work_when_user_does_not_have_auth()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        Livewire::test(MarkIdeaAsSpam::class, [
            'idea' => $idea,
        ])
            ->call('markAsSpam')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function marking_an_idea_as_spam_shows_on_menu_when_user_has_auth()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        Livewire::actingAs($user)
            ->test(MarkIdeaAsSpam::class, [
                'idea' => $idea,
                'votesCount' => 400
            ])
            ->assertSee('Mark as Spam');
    }

    /** @test */
    public function marking_an_idea_as_spam_does_not_show_on_menu_when_user_has_no_auth()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description'
        ]);

        Livewire::test
            (IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 400
            ])
            ->assertDontSee('Mark as Spam');
    }

    /** @test */
    public function marking_an_idea_as_not_spam_works_when_user_is_admin()
    {
        $user = User::factory()->create([
            'email' => 'gabriel@gressie.net'
        ]);
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description',
            'spam_reports' => 2
        ]);

        Livewire::actingAs($user)
            ->test(MarkIdeaAsNotSpam::class, [
                'idea' => $idea
            ])
            ->call('markAsNotSpam')
            ->assertEmitted('ideaWasNotSpam');

        $this->assertEquals(0, Idea::first()->spam_reports);
    }

    /** @test */
    public function spam_records_count_shows_on_ideas_index_page_if_logged_in_as_admin()
    {
        $user = User::factory()->create([
            'email' => 'gabriel@gressie.net'
        ]);
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description',
            'spam_reports' => 2
        ]);

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                'idea' => $idea,
                'votesCount' => 4
            ])
            ->assertSee('Spam Reports: [2]');
    }

    /** @test */
    public function spam_records_count_shows_on_idea_show_page_if_logged_in_as_admin()
    {
        $user = User::factory()->create([
            'email' => 'gabriel@gressie.net'
        ]);
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $status->id,
            'title' => 'My idea',
            'description' => 'description',
            'spam_reports' => 2
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 4
            ])
            ->assertSee('Spam Reports: [2]');
    }
}
