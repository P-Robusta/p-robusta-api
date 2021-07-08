<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinUsTag extends Model
{
    use HasFactory;
    protected $table = 'join_us_tags';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag'
    ];

    public function join_us()
    {
        return $this->belongsTo(JoinUs::class, 'id_tag', 'id');
    }
}
