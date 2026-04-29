<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $fillable = [
        'name',
        'nik',
        'phone',
        'position',
    ];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }   
}
