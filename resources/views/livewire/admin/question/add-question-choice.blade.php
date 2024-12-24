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
          <h4 class="card-title" id="basic-layout-form">الأسئلة</h4>
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
                <h4 class="form-section"><i class="ft-user"></i> معلومات الأسئلة</h4>
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

                                      @if($type=="block")
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label for="projectinput1">الكتل</label>
                                            <div class="card-block">
                                              <div class="card-body">
                                  <fieldset class="form-group">
                                  <select class="form-control" id="basicSelect" wire:model="block_id">
                                      <option value="">اختيار</option>
                                      @foreach ($blocks as $block )
                                      <option value="{{ $block->id }}">{{ $block->title }}</option>
                                      @endforeach
                                      </select>
                                  </fieldset>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                          @endif

                      <fieldset wire:ignore class="wrap-title">
                          <h3 class="form-title">السؤال</h3>

                          <div class="form-group row" wire:ignore>
                              <textarea type="text" input="description" id="summernote" class="form-control summernote">{{ $question }}</textarea>


                          </div>

                          </fieldset>

                                    <span style="display:none">{{$question}}</span>


                              </div>
                          </div>
                      </div><!--end main products area-->
                  </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="projectinput1">صورة السوال (اختياري)</label>
                        <input type="file" id="image" class="form-control" placeholder="ادخل صورة السوال "
                        name="fname" wire:model="image" accept="image/*">
                      </div>
                      @if($image)
                          <div class="row col-md-4">
                              <img src="{{$image->temporaryUrl()}}" width="120px" height="90px">
                          </div>
                      @endif
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1">الخيار أ</label>
                        <input type="text" id="projectinput1" class="form-control" placeholder="الخيار أ"
                        name="fname" wire:model="a">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1">الخيار ب</label>
                        <input type="text" id="projectinput1" class="form-control" placeholder="الخيار ب"
                        name="fname" wire:model="b">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1">الخيار ج</label>
                        <input type="text" id="projectinput1" class="form-control" placeholder="الخيار ج"
                        name="fname" wire:model="c">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1">الخيار د</label>
                        <input type="text" id="projectinput1" class="form-control" placeholder="الخيار د"
                        name="fname" wire:model="d">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="projectinput1">درجة السؤال</label>
                        <input type="number" id="projectinput1" class="form-control" placeholder="درجة السؤال"
                        name="fname" wire:model="mark_question">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="projectinput1">الإجابة الصحيحة</label>
                        <div class="card-block">
                          <div class="card-body">
                            <fieldset class="form-group">
                              <select class="form-control" id="basicSelect" wire:model="true_ans">
                                <option value="1">اختيار الإجابة</option>
                                <option value="a">أ</option>
                                <option value="b">ب</option>
                                <option value="c">ج</option>
                                <option value="d">د</option>
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
                  <i class="ft-x"></i> إلغاء
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="la la-check-square-o"></i> حفظ
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


</div>
