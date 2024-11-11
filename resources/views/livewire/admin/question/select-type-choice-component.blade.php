<div>


    <style>
        .card-body {
        flex: 1 1 auto;
        padding: 1rem 1rem;
        text-align: center;
    }
    </style>
    <div class="card-header">
        <h4 class="card-title">Exams</h4>
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
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <a   class="btn btn-success btn-min-width btn-glow mr-1 mb-1" href="{{ route("add_question",['type'=>"normal","id_exam"=>$id_exam] ) }}"> normal</a>
                  </div>
                </div>
            </div>
          </form>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <a   class="btn btn-success btn-min-width btn-glow mr-1 mb-1" href="{{ route("add_question",['type'=>"block","id_exam"=>$id_exam] ) }}">block</a>
                </div>
              </div>
          </div>
        </form>
      </div>

      </div>



    </div>
