<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'content'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
