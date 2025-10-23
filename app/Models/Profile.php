<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'website',
        'location',
    ];

    /**
     * Inverse one-to-one/one-to-many: Profile belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One-to-many: Profile has many Projects
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * One-to-many: Profile has many Skills
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * One-to-many: Profile has many Studies
     */
    public function studies()
    {
        return $this->hasMany(Study::class);
    }

    /**
     * One-to-many: Profile has many Trainings
     */
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    /**
     * One-to-many: Profile has many Experiences
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Polymorphic: Profile has many Images
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Polymorphic: Profile has many Links
     */
    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }
}
