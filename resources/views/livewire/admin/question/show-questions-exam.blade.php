<div>
  <style>
      .col-md-6.de {
          text-align: end;
      }
  </style>

  <div class="row" id="header-styling">
      <div class="col-md-12">
          <div class="form-group">
              <input type="text" class="form-control" placeholder="بحث..." wire:model.debounce.300ms="search">
          </div>
      </div>
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">الأسئلة مرتبطة بالاختبار {{ $exam->name_exam }}</h4>
              </div>

              @if(Session::has("message"))
                  <div class="col-md-4 mb-2">
                      <div class="alert alert-danger" role="alert">
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
                                  <th>السؤال</th>
                                  <th>الصورة</th>
                                  <th>أ</th>
                                  <th>ب</th>
                                  <th>ج</th>
                                  <th>د</th>
                                  <th>الإجابة الصحيحة</th>
                                  <th>الدرجة</th>
                                  <th>الحالة</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($questions as $question)
                                  <tr>
                                      <td>{!! $question->question !!}</td>
                                      @if (empty($question->image))
                                          <td>لا يوجد صورة</td>
                                      @else
                                          <td><img src="{{ asset($question->image) }}" alt="image"
                                                   style="width: 120px; height: 100px;"></td>
                                      @endif
                                      <td>{{ $question->a }}</td>
                                      <td>{{ $question->b }}</td>
                                      <td>{{ $question->c }}</td>
                                      <td>{{ $question->d }}</td>
                                      <td>{{ $question->trueanswer->ans }}</td>
                                      <td>{{ $question->mark_question }}</td>
                                      <td>
                                          <a class="btn btn-primary" href="{{ route('edit_question', ['question_id' => $question->id]) }}">تعديل</a>
                                          <a href="#" class="btn btn-danger manual"
                                             onclick="confirm('هل أنت متأكد من أنك تريد حذفه؟') || event.stopImmediatePropagation()"
                                             wire:click.prevent="delete_questionchoice({{ $question->id }})">حذف</a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>

                  <div class="d-flex justify-content-center">
                      {{ $questions->links() }}
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
