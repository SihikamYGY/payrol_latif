<?php

namespace App\Livewire\Payroll;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard')
            ->layout('layouts.admin'); // 🔥 WAJIB
    }
}
