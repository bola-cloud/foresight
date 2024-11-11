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
            <div class="heading-elements">
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

              <form class="form" wire:submit.prevent="create_question">

                <div class="form-body">
                  <h4 class="form-section"><i class="ft-user"></i> Block Info</h4>
                  @error('name_unit') <span class="error">{{ $message }}</span> @enderror
                  @error('year_unit') <span class="error">{{ $message }}</span> @enderror

                  @if(Session::has("message"))
                  <span class="error">{{ Session::get("message") }}</span>
                  @endif
                  <br>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="projectinput1">title</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="title"
                          name="fname" wire:model="title">
                        </div>
                      </div>
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
                            <h3 class="form-title">Block</h3>

                            <div class="form-group row" wire:ignore>
                                <textarea type="text" input="description" id="summernote" class="form-control summernote">{{ $block }}</textarea>


                            </div>

                            </fieldset>

                                      <span style="display:none">{{$block}}</span>


                                </div>
                            </div>
                        </div><!--end main products area-->
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
          @this.set('block', contents);
      }
  }
  });
              </script>


</div>



