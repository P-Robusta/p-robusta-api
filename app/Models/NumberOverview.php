<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberOverview extends Model
{
    use HasFactory;
    protected $table = 'number_overviews';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_students',
        'alumni',
        'current_students',
        'average_wage',
        'percent_get_job',
        'percent_alumni_it',
        'alumni_allowance'
    ];
}
