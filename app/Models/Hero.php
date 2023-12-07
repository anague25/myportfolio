<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hero extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function imageUrl($image):string
    {
        return Storage::disk('public')->url($image);
    }
}
