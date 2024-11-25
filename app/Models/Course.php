<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id', 'course_id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'course_id', 'course_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'course_id', 'course_id');
    }

    public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id', 'user_id');
}

}
