<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $table = 'group';

    protected $fillable = [
        'nama_group',
        'user_id',
        'acakan_ke'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
