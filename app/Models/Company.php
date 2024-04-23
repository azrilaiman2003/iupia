<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'company_name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'company_id');
    }

    public function supervisors()
    {
        return $this->hasMany(Supervisor::class, 'company_id');
    }

    public function industries()
    {
        return $this->hasMany(Industry::class, 'company_id');
    }

}
