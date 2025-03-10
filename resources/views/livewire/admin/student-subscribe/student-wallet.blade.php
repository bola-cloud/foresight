<div>
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
            @endif
            @if(Session::has('error_message'))
            <div class="alert alert-danger">
                {{ Session::get('error_message') }}
            </div>
            @endif
        </div>
        <div class="row card">
            <div class="card-header text-center p-2">
                <h5>اشتراكات المهندسين</h5>
            </div>
            <div class="card-body">
                @if(!$selectedStudent)
                    <input type="text" class="form-control" wire:model.debounce.500ms="searchTerm" placeholder="ابحث برقم الكود...">
                @endif
                @if($results)
                    <ul class="list-group">
                        @foreach($results as $result)
                            <button class="btn btn-info" wire:click="selectStudent({{ $result->id }})" type="button">
                                <li class="list-group-item">
                                    {{ $result->name }} -- {{ $result->mobile_phone }} -- {{ $result->student_code }}
                                </li>
                            </button>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{-- بيانات المهندس --}}
                @if($selectedStudent)
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>{{ $selectedStudent->name }} -- {{ $selectedStudent->mobile_phone }} -- {{ $selectedStudent->student_code }}</h5>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <h5 class="d-flex justify-content-center">الرصيد: {{ $selectedStudent->wallet }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label">المبلغ</label>
                                    <input type="number" class="form-control" wire:model="wallet" id="exampleFormControlInput1" placeholder="أدخل المبلغ">
                                    @error('wallet')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="button" wire:click="deposit" class="btn btn-primary">إيداع</button>
                                        <button type="button" wire:click="withdraw" class="btn btn-danger">سحب</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
