<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'profile_id',
        'title',
        'description',
        'url',
    ];

    /**
     * Inverse: Project belongs to Profile
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Many-to-many: Project belongs to many Skills
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Polymorphic: Project has many Images
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Polymorphic: Project has many Links
     */
    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }
}
