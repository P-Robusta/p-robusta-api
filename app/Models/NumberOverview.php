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
        'current_students',
        'alumni',
        'percent_get_job',
        'partnership',
    ];
}
