<div>
    <h1>Answer Question</h1>
    <p><strong>Question:</strong> {{ $question->content }}</p>
    <form wire:submit.prevent="saveAnswer">
        <div class="form-group">
            <label for="content">Your Answer</label>
            <textarea id="content" wire:model="content" class="form-control"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit Answer</button>
    </form>
</div>
