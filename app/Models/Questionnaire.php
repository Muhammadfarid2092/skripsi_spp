<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $table = 'questionnaire';

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
