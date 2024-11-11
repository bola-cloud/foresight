@extends('layouts.home')

@section('navbar')

<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <form action="/upload" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="video" class="form-control" accept="video/mp4,video/x-m4v,video/*">
                <br>
                <button type="submit" class="btn btn-sm btn-block btn-danger">Upload</button>
            </form>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12">
            <form method="GET" enctype="multipart/form-data">
                @csrf
                @method('get')
                <button type="submit" class="btn btn-sm btn-block btn-danger">get</button>
            </form>
        </div>
    </div> -->
</div>

@endsection