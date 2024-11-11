<div>
<style>
    .col-md-6.de {
    text-align: end;
}
</style>

    <div class="row" id="header-styling">
        <div class="col-md-12">
            <div class="form-group">

            </div>
          </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4 class="card-title">exam relate to {{ $exam->year_    }} year</h4>

              <h4 class="card-title">questions relate to {{ $exam->name_exam }}</h4>

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
                      <th>question</th>
                      <th>a</th>
                      <th>b</th>
                      <th>c</th>
                      <th>d</th>
                      <th>True answer</th>
                      <th>mark</th>
                      <th>case</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($questions as $question )
                      <tr>
                           <td>{!!$question->question!!}</td>
                            <td>{{ $question->a }}</td>
                            <td>{{ $question->b }}</td>
                            <td>{{ $question->c }}</td>
                            <td>{{ $question->d }}</td>
                            <td>{{$question->trueanswer->ans }}</td>
                            <td>{{ $question->mark_question }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{route('edit_question',['question_id'=>$question->id])}}"  >Edit  </a>

                                <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_questionchoice({{$question->id}})">Delete  </a>
                            </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

            </div>


          </div>
        </div>
      </div>
</div>
