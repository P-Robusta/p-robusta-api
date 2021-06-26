<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_title',
        'summary',
        'text_for_button',
        'image_cover',
        'content',
        'id_category',
        'time_event',
        'post_deleted',
    ];

    public function category()
    {
        return $this->hasMany(Category::class, 'id_category', 'id');
    }
}
