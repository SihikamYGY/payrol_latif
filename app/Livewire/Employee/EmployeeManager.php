<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class EmployeeManager extends Component
{
    public ?int $employee_id = null;

    public bool $isEditMode = false;

    // Properti  yg terhubung dgn input form (binding livewire)
    public string $name = '';

    public string $nik = '';

    public string $phone = '';

    public string $position = '';

    protected $listeners = [
        'employeeCreated' => 'handleEmployeeCreated',
        'employeeUpdated' => 'handleEmployeeUpdated',
    ];

    public function render()
    {
        return view('livewire.employee.employee-manager');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:employees,nik',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.unique' => 'NIK sudah digunakan oleh karyawan lain.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'position.required' => 'Posisi wajib diisi.',
        ]);

        Employee:UpdateOrCreate(
            ['id' => $this->employee_id],
            [
                'name' => $this->name,
                'nik' => $this->nik,
                'phone' => $this->phone,
                'position' => $this->position,
            ]
        );

        Employee::create([
            'name' => $this->name,
            'nik' => $this->nik,
            'phone' => $this->phone,
            'position' => $this->position,
        ]); 

        // Reset form
        $this->resetForm();

        // Emit event untuk memberi tahu komponen lain bahwa data telah dibuat
        $this->emit('employeeCreated');
    }
}
