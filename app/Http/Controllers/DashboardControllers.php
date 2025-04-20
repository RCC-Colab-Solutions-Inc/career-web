<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
Use App\Models\ApplicantsApplication;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



use Illuminate\Http\Request;

class DashboardControllers extends Controller
{
    public function index()
    {
        // 1) Total jobs
        $totalJob = JobPosting::count();
    
        // 2) Active applicants (not Decline, Rejected or Withdraw)
        $totalApplicant = ApplicantsApplication::whereNotIn('applicant_status', ['Decline', 'Rejected', 'Withdraw'])->count();
    
        // 3) New applicants
        $totalNewApplicant = ApplicantsApplication::where('applicant_status', 'New')->count();
    
        // 4) Referral source breakdown
        $sourcesCount = ApplicantsApplication::select('source', DB::raw('COUNT(*) as total'))
            ->groupBy('source')
            ->pluck('total', 'source');
    
        $grandTotal = $sourcesCount->sum(); 
        $percentage = $grandTotal > 0
            ? $sourcesCount->map(fn($count) => round($count / $grandTotal * 100, 1))
            : collect();
    
        $sources = $percentage->keys();
        $data    = $percentage->values();
        $counts  = $sourcesCount->values();
    
        // 5) Generate labels (Jan to Dec)
        $labels = collect(range(1, 12))->map(fn($m) => Carbon::create()->month($m)->format('M'));
    
        // 6) Bar data (monthly count by created_at)
        $createdCounts = ApplicantsApplication::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month'); // e.g. [1 => 20, 2 => 35]
    
        $barData = collect(range(1, 12))->map(fn($m) => $createdCounts->get($m, 0));
    
        // 7) Line data (monthly count by updated_at)
        $updatedCounts = ApplicantsApplication::selectRaw('MONTH(updated_at) as month, COUNT(*) as total')
            ->groupByRaw('MONTH(updated_at)')
            ->pluck('total', 'month'); // e.g. [1 => 15, 2 => 25]
    
        $lineData = collect(range(1, 12))->map(fn($m) => $updatedCounts->get($m, 0));
        
        //count the hired applicants
        $hiredCount = ApplicantsApplication::where('applicant_status', 'Hired')->count();

        return view('dashboard', compact(
            'totalJob',
            'totalApplicant',
            'totalNewApplicant',
            'sources',
            'data',
            'counts',
            'labels',
            'barData',
            'lineData',
            'hiredCount'
        ));
    }
}
