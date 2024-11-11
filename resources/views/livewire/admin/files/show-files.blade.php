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
              <h4 class="card-title">Files</h4>
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
                      <th>file title</th>
                      <th>name</th>
                      <th>decsription</th>
                      <th>month</th>
                      <th>download</th>
                      <th>case</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($files as $file )
                      <tr>
                        <td>{{$file->title}}</td>
                        <td>{{$file->name}}</td>
                        <td>{{$file->description}}</td>
                        <td>{{$file->month}}</td>
                        <td></td>
                        <td>
                            <a type="button" class="btn btn-primary">download file</a>
                        </td>
                        <td>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdfModal" wire:click="showFile({{  $file->id }})">Open PDF</button>
                        <button type="button" class="btn btn-danger manual" wire:click="delete_video({{ $file->id }})">delete</button>

                        </td>
                      </tr>
                      <div>
                            <!-- Bootstrap modal -->
                            <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          @if ($showModal)
                                              @if ($file_path)
<a href="https://drive.google.com/file/d/1vEdgjL6bAqpkbwOzM5Ti7s5Ue_q8IU76/view?usp=sharing" target="_blank"> view Pdf </a>;
                                              @else
                                                  <p>No file available.</p>
                                              @endif
                                          @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
</div>

