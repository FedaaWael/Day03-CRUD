<?php
// app/Models/Track.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = ['name', 'hours', 'branch', 'photo'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
