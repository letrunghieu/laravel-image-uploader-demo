<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/19/2019
 * Time: 11:53 PM
 */

namespace App\Contracts;


use App\Models\Image;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ImageTaggingContract
{
    /**
     * Add a tag to the image and return the tag model
     *
     * @param Image $image
     * @param string $tag
     * @return Tag
     */
    function tagImage(Image $image, string $tag): Tag;

    /**
     * List all images under one tag
     * @param Tag $tag
     * @return LengthAwarePaginator
     */
    function listImagesByTag(Tag $tag): LengthAwarePaginator;
}