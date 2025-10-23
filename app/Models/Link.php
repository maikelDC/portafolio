<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * Polymorphic: Link belongs to a linkable model
     */
    public function linkable()
    {
        return $this->morphTo();
    }
}
