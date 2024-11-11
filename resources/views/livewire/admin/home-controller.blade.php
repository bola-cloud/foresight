<div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
   <style>

    input.btn.btn-submit {
        background: black;
    }
    label.load {
    color: white;
    border: 2px solid;
    border-radius: 18px;
}
.login-form.form-item.form-stl {
    margin: auto;
    text-align: center;
}
img {
    width: 32%;
}
td.btnde {
    width: 100%;
}
a.btn.btn-primary.manual {
    width: 126px;
}
    </style>
<style>
    table.table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
<section id="basic-form-layouts">
    <div class="row match-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Student Search</h4>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">

              <form class="form" wire:submit.prevent="getstudent">
                <div class="form-body">
                  <h4 class="form-section"><i class="ft-user"></i> Search</h4>
                  @error('name_unit') <span class="error">{{ $message }}</span> @enderror
                  @error('year_unit') <span class="error">{{ $message }}</span> @enderror

                  @if(Session::has("message"))
                  <span class="error">{{ Session::get("message") }}</span>
                  @endif
                  <br>

                  <div class="row">
                    <div class="col-md-12">
                        <div class=" main-content-area">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    @if (Session::has('message'))
                                    <div class="alert alert-primary" role="alert">
                                        {{Session::get('message')}}
                                      </div>
                                    @endif

                                    <img src="{{asset("images/istockphoto-1329695738-612x612.jpg")}}">

                                        @csrf

                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="projectinput1">Mobile Phone</label>
                                          <input type="number" id="units" class="form-control" placeholder="search"
                                          name="fname" wire:model="search">
                                        </div>
                                      </div>

                                </div>
                            </div>
                        </div><!--end main products area-->
                    </div>



                    <div class="row">

                        </div>


                </div><!--end row-->





                </div>
                <div class="form-actions">
                  <a type="button" class="btn btn-warning mr-1" href="{{ route("home_admin") }}">
                    <i class="ft-x"></i> Cancel
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                  </button>
                </div>
              </form>

                @if($case==1)
                @if($student!=null)
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

                        <tr>

                              <td>{{ $student->name}}</td>
                              <td>{{ $student->mobile_phone  }}</td>
                              <td>{{ $student->mobile_father  }}</td>
                              <td>{{ $student->case_reverse== "0"? "not reverse":"reverse" }}</td>
                              <td class="btnde">
                                   <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to close video to this student') || event.stopImmediatePropagation()"  wire:click.prevent="deletereverse({{$student->id}})">not  video  </a>

                                <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to open video to this student') || event.stopImmediatePropagation()"  wire:click.prevent="editreverse({{$student->id}})">reverse video  </a>
                              </td>
                              <td>{{ $student->reverse_question== "0"? "not reverse":"reverse" }}</td>
                              <td class="btnde">
                                   <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to close question to this student') || event.stopImmediatePropagation()"  wire:click.prevent="deletereverseque({{$student->id}})">not  question  </a>

                                <a href="#"  class="btn btn-primary manual" onclick="confirm('are you sure to open question to this student') || event.stopImmediatePropagation()"  wire:click.prevent="editreverseque({{$student->id}})">reverse question  </a>
                              </td>
                              <td class="btnde">
                                  <a  class="btn btn-primary manual" href="{{ route("student_all_exams",['student_id'=>$student->id]) }}">Exams</a>
                                </td>

                              <td>
                               <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to delete this student') || event.stopImmediatePropagation()"  wire:click.prevent="deletestudent({{$student->id}})">delete student </a>
                             </td>
                        </tr>


                    </tbody>
                  </table>
                </div>

              </div>
              @else
              <h1>Not exist</h1>
              @endif
              @endif
            </div>
          </div>
        </div>
      </div>

  </section>














</div>



