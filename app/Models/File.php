<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $primaryKey = 'file_id';

    protected $fillable = [
        'file_title',
        'file_path',
        'course_id',
    ];

    // علاقة الملف مع الدورة (Many-to-One)
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}
