<div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">إجابات الطالب</h4>
        </div>
    </div>

    @if ($result)
        <div class="row">
            <div class="col-md-6">
                <p><strong>اسم الطالب:</strong> {{ $result->users->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>كود الطالب:</strong> {{ $result->users->student_code }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>الدرجة الكلية:</strong> {{ $result->result }}</p>
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead class="table table-bordered mb-0">
                <tr>
                    <th>رقم السؤال</th>
                    <th>إجابة الطالب</th>
                    <th>الإجابة الصحيحة</th>
                    <th>الحالة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($answers as $answer)
                    <tr>
                        <td>{{ $answer['question_id'] }}</td>
                        <td>{{ $answer['student_choice'] }}</td>
                        <td>{{ $answer['correct_choice'] }}</td>
                        <td>
                            @if ($answer['is_correct'])
                                <span class="text-success">صحيحة</span>
                            @else
                                <span class="text-danger">خاطئة</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
