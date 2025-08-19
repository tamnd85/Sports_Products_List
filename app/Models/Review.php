<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'review', 'rating'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthorAttribute()
    {
        return $this->user ? $this->user->name : 'Usuario Eliminado';
    }
}
