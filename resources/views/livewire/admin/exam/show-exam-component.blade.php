<div>


    <div class="row" id="header-styling">
        <div class="col-md-12">
            <div class="form-group">
              <label for="projectinput5">year school/{{ $year_type }}</label>

            </div>
          </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">exams</h4>

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
                      <th>name exam </th>
                      <th>case</th>
                      <th>passwords</th>
                     <th>show</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($exams as $exam )
                      <tr>
                        <td>{{ $exam->name_exam }}</td>


                        <td>
                            <a  class="btn btn-danger manual" href="{{ route("question_choice_type",['id_exam'=>$exam->id]) }}" >add questions choice</a>
 



                            <a  class="btn btn-danger manual" href="{{ route("show_question",['id_exam'=>$exam->id]) }}" >show questions</a>

                        </td>
                     <td>
                        <a  class="btn btn-primary" href="{{ route("password_exam",['id_exam'=>$exam->id]) }}" >passwords</a>
                    </td>
                        <td>
                            <div class="row">
                                <div class="col-md-8">
                                    <select class="select2 form-control" wire:change="options({{$exam->id}})"  wire:model.defer="select.{{$exam->id}}"  >

                                    <option value="3">اختر الحاله</option>
                                    <option value="1">اظهر</option>
                                    <option value="0">اخفى</option>
                                </select>
                                </div>

                                <div class="col-md-4">
                                    @if($exam->show_exam=='1')
                                    <div class="oke">
                                        <i class="fas fa-check-circle"></i>

                                    </div>
                                    @endif
                                </div>


                            </div>




                    </td>
                    <td>

                        <a type="button" class="btn btn-primary" href="{{ route("edit_exam",['id_exam'=>$exam->id]) }}">edit</a>
                        <a href="#" class="btn btn-danger"
                        onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"
                         wire:click.prevent="delete_exam({{$exam->id}})">Delete <span></span><i class="fas fa-trash-alt"></i></a>
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
