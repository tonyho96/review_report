<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uniform',
        'uniform_comment',
        'hygience',
        'hygience_comment',
        'respectful',
        'respectful_comment',
        'teamwork',
        'teamwork_comment',
        'adaptability',
        'adaptability_comment',
        'dependability',
        'dependability_comment',
        'attention_to_safety',
        'attention_to_safety_comment',
        'integrity', 'integrity_comment',
        'ability_to_tolerate_stress',
        'ability_to_tolerate_stress_comment',
        'decision_making', 'decision_making_comment',
        'assertiveness',
        'assertiveness_comment',
        'reviewer',
        'reviewee',
        'attendance',
        'tardies',
        'absences',
        'absence_hours',
        'maximum_allowable_absence_hours',
        'academic_achievement',
        'class_standing',
        'academic_achievement_percent',
        'excellence_reports',
        'discrepancy_reports',
        'disciplinary_actions',
        'staff_comments',
        'general_comments'
    ];

    public function revieweeUser() {
    	return $this->belongsTo('App\User', 'reviewee', 'id');
    }
}
