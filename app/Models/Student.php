<?php
// app/Models/Student.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'track_id', 'photo'];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_id', 'course_id');
    }
}
