<div>
<style>
    table.table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
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

              <h4 class="card-title">Students relate to</h4>

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
                      <th>name</th>
                      <th>mobile phone</th>
                     <th>mobile phone father</th>
                      <th>case reverse video</th>
                      <th>edit reverse video </th>
                      <th>case reverse question</th>
                      <th>edit reverse question </th>

                      <th>Exams </th>
                      <th>delete  </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($students as $student )
                      <tr>

                            <td>{{ $student->name}}</td>
                            <td>{{ $student->mobile_phone  }}</td>
                            <td>{{ $student->mobile_father  }}</td>
                            <td>{{ $student->case_reverse== "0"? "not reverse":"reverse" }}</td>
                            <td>
                                 <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to close video to this student') || event.stopImmediatePropagation()"  wire:click.prevent="deletereverse({{$student->id}})">not  video  </a>

                              <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to open video to this student') || event.stopImmediatePropagation()"  wire:click.prevent="editreverse({{$student->id}})">reverse video  </a>
                            </td>
                            <td>{{ $student->reverse_question== "0"? "not reverse":"reverse" }}</td>
                            <td>
                                 <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to close question to this student') || event.stopImmediatePropagation()"  wire:click.prevent="deletereverseque({{$student->id}})">not  question  </a>

                              <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to open question to this student') || event.stopImmediatePropagation()"  wire:click.prevent="editreverseque({{$student->id}})">reverse question  </a>
                            </td>
                            <td>
                                <a  class="btn btn-primary manual" href="{{ route("student_all_exams",['student_id'=>$student->id]) }}">Exams</a>
                              </td>

                            <td>
                             <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to delete this student') || event.stopImmediatePropagation()"  wire:click.prevent="deletestudent({{$student->id}})">delete student </a>
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
