<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Polymorphic: Image belongs to an imageable model
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
