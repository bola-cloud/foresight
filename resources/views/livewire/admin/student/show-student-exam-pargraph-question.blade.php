<div>
<style>
    label.true {
    color: #2dc45b;
    font-size: 14px;
    font-weight: bold;
}
</style>
<style>
    label.wrong {
    color: #c42d2d;
    font-size: 14px;
    font-weight: bold;
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

              <h4 class="card-title">Students relate to {{ $user->name }}</h4>

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
                      <th>true answer</th>
                      <th>answer student</th>
                      <th>check answer</th>
                      <th>value mark</th>
                      <th>btn result </th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($questionpargraphs as $key=> $questionpargraph )

                      <tr>
                        <td>{!! $questionpargraph['question_id']['question'] !!}</td>
                        <td>{{  $questionpargraph['question_id']['answer'] }}</td>
                        <td>{{ $questionpargraph['answer']}}</td>
                        <td>@if( $questionpargraph['value']=="0")
                            check
                            @elseif( $questionpargraph['value']=="1")
                            <label class="true" for="projectinput1">true</label>

                            @elseif( $questionpargraph['value']=="2")
                            <label class="wrong" for="projectinput1">wrong</label>


                            @endif
                        </td>

                            <td>{{  $questionpargraph['question_id']['mark_question'] }}</td>


                        <td>

                            <div class="row">
                                @if($questionpargraph['value']=="2" || $questionpargraph['value']==null)
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" wire:click="correct({{ $student_id }},{{ $exam_id }},{{ $key }})">
                                    <i class="la la-check-square-o" ></i> correct
                                  </button>

                              </div>
                              @endif
                              @if($questionpargraph['value']=="1")

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger" wire:click="wrong({{ $student_id }},{{ $exam_id }},{{ $key }})">
                                    <i class="la la-check-square-o" ></i> wrong
                                  </button>
                              </div>
                              @endif

                            </div>
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
