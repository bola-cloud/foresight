<div>
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{Session::get('success_message')}}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{Session::get('error_message')}}
                </div>
            @endif
            @if(Session::has('warning_message'))
                <div class="alert alert-warning">
                    {{Session::get('warning_message')}}
                </div>
            @endif
        </div>
        <div class="row card">
            <div class="card-header text-center p-2">
                <h5>Student subscriptions</h5>
            </div>
            <div class="card-body">
                @if(!$selectedStudent)
                    <input type="text" class="form-control" wire:model.debounce.500ms="searchTerm" placeholder="Search With Code..." >
                @endif
                @if($results)
                    <ul class="list-group">
                        @foreach($results as $result)
                            <button class="btn btn-info" wire:click="selectStudent({{ $result->id }})" type="button">
                                <li class="list-group-item">
                                    {{ $result->name }} --  {{ $result->mobile_phone }}
                                </li>
                            </button>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{-- add user data --}}
                @if($selectedStudent)
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>{{ $selectedStudent->name }} -- {{ $selectedStudent->mobile_phone }}</h5>
                        </div>
                        <div class="card-body">
                            <h6>Lectures:</h6>
                            <ul class="list-group">
                                @foreach($lectures as $lecture)
                                    <li class="list-group-item">{{ $lecture->name }} {{ $lecture->unit->name }}</li>
                                @endforeach
                            </ul>
                            <br> 
                            <h6>Units:</h6>
                            <ul class="list-group">
                                @foreach($units as $unit)
                                    <li class="list-group-item">{{ $unit->name }}</li>
                                @endforeach
                            </ul>
                            <br> 
                            <h6>Wallet:</h6>
                            <ul class="list-group">
                                <li class="list-group-item">{{ $selectedStudent->wallet }}</li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
