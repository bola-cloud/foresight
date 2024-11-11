<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header text-center p-2">
                        <h5>Transactions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="search" class="form-label">Search</label>
                                <input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="Search...">
                            </div>
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">From Date:</label>
                                <input type="date" class="form-control" id="start_date" wire:model="startDate">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">To Date:</label>
                                <input type="date" class="form-control" id="end_date" wire:model="endDate">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>Total Deposits: ${{ $totalDeposits }}</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>Total Withdrawals: ${{ $totalWithdrawals }}</h6>
                            </div>
                            <div class="col-md-4">
                                <h6>Total Revenue: ${{ $totalRevenue }}</h6>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Method</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>User</th>
                                    <th>Lecture</th>
                                    <th>Unit</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr class="{{ $transaction->type === 'deposite' ? 'table-success' : 'table-danger' }}">
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->code }}</td>
                                    <td>{{ $transaction->method }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->user->name ?? 'N/A' }}</td>
                                    <td>{{ optional($transaction->lecture)->name ?? 'N/A' }}</td>
                                    <td>{{ optional($transaction->unit)->name ?? 'N/A' }}</td>
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
