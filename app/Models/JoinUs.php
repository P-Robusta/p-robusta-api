<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinUs extends Model
{
    use HasFactory;
    protected $table = 'join_us';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'id_tag',
        'organisation',
        'reporting_to',
        'status',
        'project',
        'stat_date',
        'location',
        'jd',
    ];

    public function join_us_tag()
    {
        return $this->hasMany(JoinUsTag::class, 'id_tag', 'id');
    }
}
