<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/19/2019
 * Time: 11:49 PM
 */

namespace App\Contracts;


use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TagsContract
{
    /**
     * Create a tag if the name does not exist, otherwise return the existing tag
     * @param string $name
     * @return Tag
     */
    function create(string $name): Tag;

    /**
     * Get the list of tags ordered by tag name
     * @return LengthAwarePaginator
     */
    function listTags(): LengthAwarePaginator;
}