<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * Inverse: Training belongs to Profile
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
