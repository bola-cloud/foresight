<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header text-center p-2">
                        <h5>المعاملات المالية</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="search" class="form-label">بحث</label>
                                <input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="ابحث...">
                            </div>
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">من تاريخ:</label>
                                <input type="date" class="form-control" id="start_date" wire:model="startDate">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">إلى تاريخ:</label>
                                <input type="date" class="form-control" id="end_date" wire:model="endDate">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>إجمالي الإيداعات: {{ $totalDeposits }} $</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>إجمالي السحوبات: {{ $totalWithdrawals }} $</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>إجمالي الإيرادات: {{ $totalRevenue }} $</h6>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>رقم المعاملة</th>
                                    <th>الكود</th>
                                    {{-- <th>الطريقة</th> --}}
                                    {{-- <th>النوع</th> --}}
                                    <th>المبلغ</th>
                                    <th>المستخدم</th>
                                    {{-- <th>المحاضرة</th> --}}
                                    <th>الكورس</th>
                                    <th>تاريخ الإنشاء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr class="{{ $transaction->type === 'deposite' ? 'table-success' : 'table-danger' }}">
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->code }}</td>
                                    {{-- <td>{{ $transaction->method }}</td> --}}
                                    {{-- <td>{{ $transaction->type }}</td> --}}
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->user->name ?? 'غير متوفر' }}</td>
                                    {{-- <td>{{ optional($transaction->lecture)->name ?? 'غير متوفر' }}</td> --}}
                                    <td>{{ optional($transaction->unit)->name ?? 'غير متوفر' }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
