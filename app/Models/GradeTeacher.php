<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeTeacher extends Model
{
    use HasFactory;

    protected $table = 'grade_teacher';

    protected $fillable = [
        'grade',
        'siswa',
        'acakan_ke',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class);
    }
}
