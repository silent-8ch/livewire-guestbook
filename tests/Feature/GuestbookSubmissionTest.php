<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class GuestbookSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_guestbook_page_loads(): void
    {
        $response = $this->get(route('guestbook'));

        $response->assertOk();
        $response->assertSee('Guestbook');
    }

    public function test_guest_can_submit_an_entry(): void
    {
        Livewire::test('guestbook-form')
            ->set('name', 'Guest User')
            ->set('email', 'guest@example.test')
            ->set('message', 'Thanks for the great event and hospitality!')
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('guestbook_entries', [
            'name' => 'Guest User',
            'email' => 'guest@example.test',
            'status' => 'new',
            'submitted_by_user_id' => null,
        ]);
    }

    public function test_authenticated_user_submission_tracks_user_id(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test('guestbook-form')
            ->set('name', 'Signed In User')
            ->set('email', 'signed@example.test')
            ->set('message', 'Hello from an authenticated account.')
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('guestbook_entries', [
            'name' => 'Signed In User',
            'submitted_by_user_id' => $user->id,
        ]);
    }

    public function test_entry_validation_requires_name_and_message(): void
    {
        Livewire::test('guestbook-form')
            ->set('name', '')
            ->set('message', '')
            ->call('submit')
            ->assertHasErrors(['name' => ['required'], 'message' => ['required']]);
    }
}
