<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/20/2019
 * Time: 1:04 AM
 */

namespace App\Http\Controllers;


use App\Contracts\ImageTaggingContract;
use App\Contracts\TagsContract;
use App\Models\Tag;

class TagController extends Controller
{
    // Show the list of tags
    public function index(TagsContract $tagsContract)
    {
        $tags = $tagsContract->listTags();

        return view('tags.index', compact('tags'));
    }

    // Show the list of images belonging to one tag
    public function show(Tag $tag, ImageTaggingContract $imageTaggingContract)
    {
        $images = $imageTaggingContract->listImagesByTag($tag);

        return view('tags.show', compact('tag', 'images'));
    }
}