<div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">إجابات الطالب</h4>
        </div>
    </div>

    @if ($result)
        <div class="row">
            <div class="col-md-6">
                <p><strong>اسم الطالب:</strong> {{ $result->user->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>كود الطالب:</strong> {{ $result->user->student_code }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>الدرجة:</strong> {{ $result->result }}</p>
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead class="table table-bordered mb-0">
                <tr>
                    <th>رقم السؤال</th>
                    <th>الإجابة المختارة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($answers as $answer)
                    <tr>
                        <td>{{ $answer['question_id'] }}</td>
                        <td>{{ $answer['choice'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
