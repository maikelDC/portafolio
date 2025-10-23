<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /**
     * Inverse: Experience belongs to Profile
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
