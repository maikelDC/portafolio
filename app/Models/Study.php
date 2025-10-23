<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    /**
     * Inverse: Study belongs to Profile
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
