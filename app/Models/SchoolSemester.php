<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_year',
        'start_at',
        'end_at',
        'year',
        'semester_id',
        'school_id',
        'is_updated',
        'is_active'
    ];

    public function school()
    {
        return $this->belongsTo('App\Models\SchoolCampus', 'school_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'semester_id', 'id');
    }

    public function enrollments()
    {
        return $this->hasMany('App\Models\ScholarEnrollment', 'semester_id');
    } 

    public function getStartAtAttribute($value)
    {
        return date('M Y', strtotime($value));
    }

    public function getEndAtAttribute($value)
    {
        return date('M Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }
}
