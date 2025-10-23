<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * Inverse: Skill belongs to Profile
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Many-to-many: Skill belongs to many Projects
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
