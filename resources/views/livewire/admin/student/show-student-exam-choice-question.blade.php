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
                      <th>question</th>
                      <th>true answer</th>
                      <th>answer student</th>
                      <th>case </th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($questionchoices as $questionchoice )

                  @if($questionchoice['question_id']['type']=="normal")
                      <tr>
                        <td>{!! $questionchoice['question_id']['question'] !!}</td>
                        <td>{{  $questionchoice['question_id']['trueanswer']['ans']  }}</td>
                        <td>{{ $questionchoice['choice']}}</td>
                        <td>{{ $questionchoice['value']=="0"? "wrong" :"true"}}</td>
                      </tr>
                      @endif
                    @endforeach

                  </tbody>
                </table>
              </div>

            </div>

        </div>
      </div>
</div>
