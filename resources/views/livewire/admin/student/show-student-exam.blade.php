<div>


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
                      <th>name exam</th>
                      <th>result</th>
                      <th>show result </th>
                      <th>show result change </th>
                      <th>question choice </th>
                      <th>question block </th>
                      <th>question pargraph </th>
                      <th>delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($exams as $exam )
                      <tr>

                            <td>{{ $exam->exam->name_exam}}</td>
                            <td>{{ $exam->result  }}</td>
                            <td>{{ $exam->show_Result== "0"? "not show":"show" }}</td>
                          <td>
                                 <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to show result exam to this student') || event.stopImmediatePropagation()"  wire:click.prevent="hiddenresult({{$exam->id}})">not show  </a>

                              <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to hidden result exam to this student') || event.stopImmediatePropagation()"  wire:click.prevent="showresult({{$exam->id}})">show  </a>
                            </td>

                            <td>
                                <a  class="btn btn-primary manual" href="{{ route("student_choice_exam",['student_id'=>$exam->user_id ,'exam_id'=>$exam->exam_id]) }}">choices</a>
                              </td>
                              <td>
                                <a  class="btn btn-primary manual" href="{{ route("student_block_exam",['student_id'=>$exam->user_id ,'exam_id'=>$exam->exam_id]) }}">blocks</a>
                              </td>
                              <td>
                                <a  class="btn btn-primary manual" href="{{ route("student_pargraph_exam",['student_id'=>$exam->user_id ,'exam_id'=>$exam->exam_id]) }}">pargraph</a>
                              </td>

                              <td>
                                <a href="#"  class="btn btn-danger " onclick="confirm('are you sure to delete this result') || event.stopImmediatePropagation()"  wire:click.prevent="showresult({{$exam->id}})">delete</a>
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
