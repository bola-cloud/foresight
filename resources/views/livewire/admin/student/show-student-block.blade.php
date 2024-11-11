<div>


    <div class="row" id="header-styling">
        <div class="col-md-12">
            <div class="form-group">

            </div>
          </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">


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
                      <th>case </th>
                        <th>block</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($questionchoices as $questionchoice )
                      <tr>
                        <td>{!! isset($questionchoice['question_id']['question'])  ? $questionchoice['question_id']['question'] : "" !!}</td>
                        <td>{{  isset($questionchoice['question_id']['trueanswer']['ans'])? $questionchoice['question_id']['trueanswer']['ans'] : ""   }}</td>
                        <td>{{ isset($questionchoice['choice']) }}</td>
                        <td>{{ $questionchoice['value']=="0"? "wrong" :"true"}}</td>
                        <td>{{ isset($questionchoice['question_id']['block']['title']) ? $questionchoice['question_id']['block']['title'] : ""}}</td>

                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

            </div>

        </div>
      </div>
</div>
