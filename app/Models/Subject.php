<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subject";
    protected $fillable = [
        'student_id', 'name', 'marks_scored', 'grade'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
