<div>

        @if($type=="normal")
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
                      <td>{{$question->trueanswer  }}</td>
                      <td>
                          <a class="btn btn-primary" href="{{route('moneyedit_question',['type'=>$question->type,'ide'=>$question->id])}}"  >Edit  </a>

                          <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_question({{$question->id}})">Delete  </a>
                      </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        @elseif ($type=="pargraph")
        <div class="card-content collapse show">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                    <h4 class="card-title">Pargraph </h4>
                </div>

            </div>

            </div>
            <div class="table-responsive">
              <table class="table">
                <thead class="table table-bordered mb-0">
                  <tr>
                    <th>question</th>
                    <th>answer</th>
                    <th>case</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($questions as $question )
                    <tr>
                         <td>{!!$question->question!!}</td>

                         <td>{{$question->answer}}</td>

                          <td>
                              <a class="btn btn-primary" href="{{route('moneyedit_question',['type'=>$question->type,'ide'=>$question->id])}}"  >Edit  </a>

                              <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_questionpargraph({{$question->id}})">Delete  </a>
                          </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>

          </div>

        @elseif ($type=="block")
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
                    <th>head Title</th>
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
                          <td>{{$question->trueanswer  }}</td>
                          <td>{{ $question->block->title }}</td>

                          <td>


                            <a class="btn btn-primary" href="{{route('editblockmoney',['ide'=>$question->block_id,'year_type'=>$year_type])}}"  > edit block  </a>


                            <a class="btn btn-primary" href="{{route('showblockmoney',['ide'=>$question->block_id ])}}"  >show block  </a>

                              <a class="btn btn-primary" href="{{route('moneyedit_question',['type'=>$question->type,'ide'=>$question->id])}}"  >Edit  </a>

                              <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_question({{$question->id}})">Delete  </a>
                          </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>

          </div>
        @endif
      </div>
</div>
