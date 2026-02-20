<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'career_id',
        'years_of_experience',
        'qualification',
        'cover_letter',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relationship to Career
     */
    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    /**
     * Polymorphic relationship to ImageFiles (for resume uploads)
     */
    public function imageFiles()
    {
        return $this->morphMany(ImageFile::class, 'imageable');
    }
}
