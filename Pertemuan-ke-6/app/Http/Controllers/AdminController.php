<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        $completedTransactions = Transaction::query()->where('status', 'completed');
        $today = now()->toDateString();
        $month = now();

        $todayRevenue = (clone $completedTransactions)
            ->whereDate('created_at', $today)
            ->sum('total_amount');

        $monthRevenue = (clone $completedTransactions)
            ->whereYear('created_at', $month->year)
            ->whereMonth('created_at', $month->month)
            ->sum('total_amount');

        $todayTransactionCount = (clone $completedTransactions)
            ->whereDate('created_at', $today)
            ->count();

        return view('admin.dashboard', compact(
            'todayRevenue',
            'monthRevenue',
            'todayTransactionCount',
        ));
    }
}
