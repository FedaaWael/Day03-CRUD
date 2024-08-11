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
}
