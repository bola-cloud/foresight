<?php

namespace App\Http\Livewire\Admin\Transactions;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionIndex extends Component
{
    public $search;
    public $startDate;
    public $endDate;
    public $transactions;
    public $totalDeposits;
    public $totalWithdrawals;
    public $totalRevenue;

    public function mount()
    {
        $this->fetchTransactions();
        $this->calculateTotals();
    }

    public function updated()
    {
        $this->fetchTransactions();
        $this->calculateTotals();
    }

    public function render()
    {
        return view('livewire.admin.transactions.transaction-index', [
            'transactions' => $this->transactions,
            'totalDeposits' => $this->totalDeposits,
            'totalWithdrawals' => $this->totalWithdrawals,
            'totalRevenue' => $this->totalRevenue,
        ])->layout('layouts.admin');
    }

    private function fetchTransactions()
    {
        $this->transactions = $this->filterTransactions();
    }

    private function filterTransactions()
    {
        $query = Transaction::with(['user', 'lecture', 'unit'])
            ->orderBy('created_at', 'desc');

        if ($this->search) {
            $query->where(function($q) {
                $q->where('code', 'like', '%' . $this->search . '%')
                    ->orWhere('method', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%')
                    ->orWhere('amount', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('lecture', function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('unit', function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay(),
            ]);
        }

        return $query->get();
    }

    private function calculateTotals()
    {
        $this->totalDeposits = $this->transactions->where('type', 'deposite')->sum('amount');
        $this->totalWithdrawals = $this->transactions->where('type', 'withdraw')->sum('amount');
        $this->totalRevenue = $this->totalDeposits - $this->totalWithdrawals;
    }
}
