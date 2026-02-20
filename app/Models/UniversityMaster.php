<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniversityMaster extends Model
{
    protected $table = 'university_master';

    protected $fillable = [
        'uni_name',
        'state_name',
        'code',
        'email',
        'mobile',
        'status',
        'created_by',
        'created_date',
        'update_date',
        'last_modify',
        'deleted_date',
        'is_active'
    ];

    public $timestamps = false;
}
