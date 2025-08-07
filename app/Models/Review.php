<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'review', 'rating'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
