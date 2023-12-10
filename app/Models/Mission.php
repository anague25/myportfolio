<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mission extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function experience():BelongsTo{
        return $this->belongsTo(Experience::class);
    }
}
