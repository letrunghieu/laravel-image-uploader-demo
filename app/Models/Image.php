<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/19/2019
 * Time: 11:47 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'original_name',
        'object_name'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'image_tag');
    }
}