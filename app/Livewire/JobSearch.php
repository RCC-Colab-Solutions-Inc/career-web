<?php

namespace App\Livewire;
use App\Models\JobPosting;
use Livewire\Component;

class JobSearch extends Component
{
    public $search = '';

    public function render()
    {
        $jobs = JobPosting::withCount('applicants')
            ->where('jobtitle', 'like', '%' . $this->search . '%')
            ->orWhere('joblocation', 'like', '%' . $this->search . '%')
            ->orWhere('jobtype', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('livewire.job-search', compact('jobs'));
    }
}
