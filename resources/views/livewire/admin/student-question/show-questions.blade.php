<div class="card p-5">
    <h1 class="mb-4">Student Questions</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Content</th>
                <th>Student</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->content }}</td>
                    <td>{{ $question->user->name }}</td>
                    <td>
                        <a href="{{ route('answer-question', ['questionId' => $question->id]) }}" class="btn btn-primary">Answer</a>
                        @if($question->answers->count() > 0)
                            <button wire:click="toggleAnswers({{ $question->id }})" class="btn btn-secondary">
                                {{ $question->answers->count() }} Answer(s)
                            </button>
                        @else
                            <button class="btn btn-secondary" disabled>No Answers</button>
                        @endif
                    </td>
                </tr>
                @if($expandedQuestionId === $question->id)
                    <tr>
                        <td colspan="3">
                            <div>
                                <ul>
                                    @foreach($question->answers as $answer)
                                        <li>{{ $answer->content }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
