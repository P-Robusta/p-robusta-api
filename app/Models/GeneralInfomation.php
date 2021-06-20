<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInfomation extends Model
{
    use HasFactory;
    protected $table = 'general_infomations';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'introduction',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
    ];
}
