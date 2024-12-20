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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center p-2">
                        <h5>إنشاء اشتراك جديد للطالب</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="subscript" enctype="multipart/form-data" id="addSubscript" class="row">
                            @csrf
                            <div class="col-md-4 mb-3">
                                <div class="">
                                    <label for="exampleFormControlInput1" class="form-label">اختيار الطالب</label>
                                    @if(!$selectedStudent)
                                        <input type="text" class="form-control" wire:model.debounce.500ms="searchTerm" placeholder="ابحث برقم الكود...">
                                    @endif
                                    @if($results)
                                        <ul class="list-group">
                                            @foreach($results as $result)
                                                <button class="btn btn-outline-info" wire:click="selectStudent({{ $result->id }})" type="button">
                                                    <li class="list-group-item">
                                                        {{ $result->name }} -- {{ $result->mobile_phone }}
                                                    </li>
                                                </button>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlInput1" class="form-label">نوع الاشتراك</label>
                                <select class="form-select" aria-label="Default select example" id="subscription_type" wire:model="subscription_type">
                                    <option value="0" selected>نوع الاشتراك</option>
                                    <option value="month">شهري</option>
                                    <option value="lecture">محاضرة</option>
                                </select>  
                                @error('subscription_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if($subscription_type == "lecture")
                                <div class="col-md-4" id="lectures">
                                    <label for="exampleFormControlInput1" class="form-label">المحاضرة</label>
                                    <select class="form-select" aria-label="Default select example" id="lecture_id" wire:model="lecture_id">
                                        <option value="0" selected>اختر المحاضرة</option>
                                        @foreach ($lectures as $lecture)
                                            <option value="{{$lecture->id}}">{{$lecture->name}} </option>  
                                        @endforeach
                                    </select>  
                                    @error('lecture_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            @if($subscription_type == "month")
                                <div class="col-md-4" id="month">
                                    <label for="exampleFormControlInput1" class="form-label">الشهر</label>
                                    <select class="form-select" aria-label="Default select example" id="month_id" wire:model="month_id">
                                        <option value="0" selected>اختر الشهر</option>
                                        @foreach ($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}} </option>  
                                        @endforeach
                                    </select>  
                                    @error('month_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </form> 
                        <button class="btn btn-primary" form="addSubscript">إضافة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
