<div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">نتائج الطلاب للامتحان</h4>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="table table-bordered mb-0">
                <tr>
                    <th>اسم الطالب</th>
                    <th>كود الطالب</th>
                    <th>الدرجة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result->user->name }}</td>
                        <td>{{ $result->user->student_code }}</td>
                        <td>{{ $result->result }}</td>
                        <td>
                            <a href="{{ route('show_student_answers', ['id_exam' => $id_exam, 'user_id' => $result->user->id]) }}" 
                               class="btn btn-success">
                                عرض الإجابات
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
