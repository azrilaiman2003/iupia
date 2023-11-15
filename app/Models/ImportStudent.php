<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportStudent extends Model
{
    use HasFactory;

    protected $table = 'import_students';

    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
