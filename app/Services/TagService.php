<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/20/2019
 * Time: 12:30 AM
 */

namespace App\Services;


use App\Contracts\TagsContract;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TagService implements TagsContract
{
    private $perPage;

    /**
     * TagService constructor.
     * @param int $perPage
     */
    public function __construct(int $perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * Create a tag if the name does not exist, otherwise return the existing tag
     * @param string $name
     * @return Tag
     */
    function create(string $name): Tag
    {
        $tag = Tag::where('tag_name', $name)->first();
        if (!$tag) {
            $tag = new Tag(['tag_name' => $name]);
            $tag->save();
        }

        return $tag;
    }

    /**
     * Get the list of tags ordered by tag name
     * @return LengthAwarePaginator
     */
    function listTags(): LengthAwarePaginator
    {
        return Tag::orderBy('tag_name')
            ->paginate($this->perPage);
    }
}