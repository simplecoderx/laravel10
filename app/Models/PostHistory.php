<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'username',
        'password',
        'post_id',
        'changed_by',
        'changed_at',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
