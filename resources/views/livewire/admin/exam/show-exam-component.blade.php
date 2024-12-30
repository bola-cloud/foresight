<div>
    <div class="row" id="header-styling">
        <div class="col-md-6">
            <div class="form-group">
                <label for="search">بحث</label>
                <input type="text" id="search" class="form-control" placeholder="بحث..." wire:model.debounce.300ms="search">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="filterUnit">اختيار الكورس</label>
                <select id="filterUnit" class="form-control" wire:model="filterUnit">
                    <option value="">جميع الكورسات</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الامتحانات</h4>
            </div>

            @if(Session::has("message"))
                <div class="col-md-4 mb-2">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get("message") }}
                        <a class="alertAnimation float-right" data-animation="zoomIn">
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endif

            <div class="card-content collapse show">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table table-bordered mb-0">
                            <tr>
                                <th>اسم الامتحان</th>
                                <th>الإجراءات</th>
                                <th>الحالة</th>
                                <th>إدارة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $exam->name_exam }}</td>
                                    <td>
                                        <a class="btn btn-danger manual" href="{{ route("add_question", ['type' => "normal", "id_exam" => $exam->id]) }}">إضافة أسئلة</a>
                                        <a class="btn btn-danger manual" href="{{ route('show_question', ['id_exam' => $exam->id]) }}">عرض الأسئلة</a>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <select class="select2 form-control" wire:change="options({{ $exam->id }})" wire:model.defer="select.{{ $exam->id }}">
                                                    <option value="3">اختر الحالة</option>
                                                    <option value="1">إظهار</option>
                                                    <option value="0">إخفاء</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                @if($exam->show_exam == '1')
                                                    <div class="oke">
                                                        <i class="fas fa-check-circle"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-primary" href="{{ route('edit_exam', ['id_exam' => $exam->id]) }}">تعديل</a>
                                        <a href="#" class="btn btn-danger"
                                           onclick="confirm('هل أنت متأكد أنك تريد حذف هذا الامتحان؟') || event.stopImmediatePropagation()"
                                           wire:click.prevent="delete_exam({{ $exam->id }})">حذف <span></span><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $exams->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
