<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    
    protected $table = 'grade';

    protected $fillable = [
        'grade',
        'penilai',
        'dinilai',
        'question_id',
        'acakan_ke'
    ];

    public function penilai()
    {
        return $this->belongsTo(User::class);
    }

    public function dinilai()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
