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
    </style>

<section id="basic-form-layouts">
    <div class="row match-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">questions</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements" style="top: 4px">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">

              <form class="form" wire:submit.prevent="updateQuestion">
                <div class="form-body">
                  <h4 class="form-section"><i class="ft-user"></i> questions Info</h4>
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
                                    <form name="frm-login" wire:submit.prevent="storeQuestion" >
                                        @csrf
                        <fieldset wire:ignore class="wrap-title">
                            <h3 class="form-title">Question</h3>

                            <div class="form-group row" wire:ignore>
                                <textarea type="text" input="description" id="summernote" class="form-control summernote">{{ $question }}</textarea>


                            </div>

                            </fieldset>

                                      <span style="display:none">{{$question}}</span>


                                </div>
                            </div>
                        </div><!--end main products area-->
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">choice a</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="choice a"
                          name="fname" wire:model="a">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">choice b</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="choice b"
                          name="fname" wire:model="b">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">choice c</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="choice c"
                          name="fname" wire:model="c">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">choice d</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="choice d"
                          name="fname" wire:model="d">
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="projectinput1">True answer</label>
                          <div class="card-block">
                            <div class="card-body">
                              <fieldset class="form-group">
                                <select class="form-control" id="basicSelect" wire:model="true_ans">
                                  <option value="1">Select Option</option>
                                  <option value="a">a</option>
                                  <option value="b">b</option>
                                  <option value="c">c</option>
                                  <option value="d">d</option>
                                 </select>
                              </fieldset>
                            </div>
                          </div>
                        </div>
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
            </div>
          </div>
        </div>
      </div>

  </section>









            <script>
       $('.summernote').summernote({
      tabsize: 2,
      height: 200,
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
      ],
      callbacks: {
          onChange: function(contents, $editable) {
          @this.set('question', contents);
      }
  }
  });
              </script>
<script>
    document.addEventListener('livewire:load', function () {
            @this.true_ans=document.getElementById("selects").value;
            Livewire.emit('updateanswer');
        })
</script>

</div>



