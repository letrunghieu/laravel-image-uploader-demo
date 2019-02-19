<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/19/2019
 * Time: 11:46 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag_name'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_tag');
    }
}