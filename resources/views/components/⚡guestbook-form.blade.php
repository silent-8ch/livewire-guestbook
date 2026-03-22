<?php

use App\Models\GuestbookEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $message = '';

    public bool $submitted = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:5', 'max:2000'],
        ];
    }

    public function submit(): void
    {
        $rateKey = 'guestbook-submit:'.request()->ip();

        if (RateLimiter::tooManyAttempts($rateKey, 5)) {
            $seconds = RateLimiter::availableIn($rateKey);

            throw ValidationException::withMessages([
                'message' => "Too many submissions. Please try again in {$seconds} seconds.",
            ]);
        }

        RateLimiter::hit($rateKey, 60);

        $validated = $this->validate();

        GuestbookEntry::query()->create([
            'name' => trim($validated['name']),
            'email' => filled($validated['email']) ? trim($validated['email']) : null,
            'message' => trim($validated['message']),
            'status' => 'new',
            'submitted_by_user_id' => Auth::id(),
        ]);

        $this->reset(['name', 'email', 'message']);
        $this->submitted = true;
    }
};
?>

<div class="space-y-4">
    @if ($submitted)
        <div class="rounded-lg border border-emerald-700 bg-emerald-950/60 px-4 py-3 text-sm text-emerald-300">
            Your message has been submitted.
        </div>
    @endif

    <form wire:submit="submit" class="space-y-4">
        <div class="space-y-1">
            <label for="guestbook-name" class="text-sm font-medium text-zinc-300">Name</label>
            <input
                id="guestbook-name"
                type="text"
                wire:model.blur="name"
                maxlength="120"
                class="w-full rounded-md border border-zinc-600 bg-zinc-800/70 px-3 py-2 text-sm text-zinc-100 placeholder-zinc-500 focus:border-zinc-400 focus:ring-zinc-400"
                required
            >
            @error('name') <p class="text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="space-y-1">
            <label for="guestbook-email" class="text-sm font-medium text-zinc-300">Email (optional)</label>
            <input
                id="guestbook-email"
                type="email"
                wire:model.blur="email"
                maxlength="255"
                class="w-full rounded-md border border-zinc-600 bg-zinc-800/70 px-3 py-2 text-sm text-zinc-100 placeholder-zinc-500 focus:border-zinc-400 focus:ring-zinc-400"
            >
            @error('email') <p class="text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="space-y-1">
            <label for="guestbook-message" class="text-sm font-medium text-zinc-300">Message</label>
            <textarea
                id="guestbook-message"
                wire:model.blur="message"
                rows="6"
                maxlength="2000"
                class="w-full rounded-md border border-zinc-600 bg-zinc-800/70 px-3 py-2 text-sm text-zinc-100 placeholder-zinc-500 focus:border-zinc-400 focus:ring-zinc-400"
                required
            ></textarea>
            @error('message') <p class="text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit" class="inline-flex items-center rounded-md bg-zinc-700 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-600">
                Submit
            </button>
        </div>
    </form>
</div>