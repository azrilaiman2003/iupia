<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $table = 'logbook';

    protected $fillable = [
        'title',
        'category',
        'date',
        'hari',
        'location',
        'field1',
        'field2',
        'field3',
        'field4',
        'file',
    ];

    public function logbookRelay()
    {
        return $this->hasMany(LogbookRelay::class, 'logbook_id');
    }
}
