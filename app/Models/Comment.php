<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'reply_id',
        'level_star',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    // public function comment()
    // {
    //     return $this->belongsTo(Comment::class, 'id', 'reply_id');
    // }
    // public function replies()
    // {
    //     return $this->hasMany(Comment::class, 'id', 'reply_id');
    // }
}
