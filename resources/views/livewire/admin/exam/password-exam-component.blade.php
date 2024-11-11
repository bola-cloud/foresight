<div>

<style>
    a.btn.btn-primary {
    width: 95px;
    font-size: 15px;
    font-weight: bold;
}
</style>
    <div class="row" id="header-styling">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">passwords</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements" style="top: 4px">
                <ul class="list-inline mb-0">
                    <a  class="btn btn-primary"  onclick=javascript:print("http://127.0.0.1:8000/printpass/{{$id_exam}}") href="#" >print</a>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">

              <div class="table-responsive">
                <table class="table">
                  <thead class="table table-bordered mb-0">
                    <tr>
                      <th>key</th>
                      <th>password</th>


                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($passwords as $key=> $password )
                      <tr>
                        <td>{{ $key+1 }}
                            <td>
                        {{$password}}
                              </td>
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
      <script>
        function print(url) {
        var printWindow = window.open( url);
        printWindow.print();
    };
     </script>
</div>
