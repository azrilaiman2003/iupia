<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogbookRelay extends Model
{
    use HasFactory;

    protected $table = 'logbook_relay';

    protected $fillable = [
        'logbook_id',
        'student_id',
    ];

    public function logbook()
    {
        return $this->belongsTo(Logbook::class, 'logbook_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
