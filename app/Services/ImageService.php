<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/20/2019
 * Time: 12:34 AM
 */

namespace App\Services;


use App\Contracts\ImageContract;
use App\Contracts\ImageTaggingContract;
use App\Contracts\TagsContract;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;

class ImageService implements ImageContract, ImageTaggingContract
{

    private $perPage;

    /**
     * @var TagsContract
     */
    private $tags;

    /**
     * ImageService constructor.
     * @param $perPage
     * @param TagsContract $tags
     */
    public function __construct($perPage, TagsContract $tags)
    {
        $this->perPage = $perPage;
        $this->tags = $tags;
    }


    /**
     * Create a new image from an uploaded file
     * @param UploadedFile $file
     * @return Image
     */
    function createFromUpload(UploadedFile $file): Image
    {
        // Get the original name, extension and generate a new unique random name for the uploaded file
        $originalName = $file->getClientOriginalName();
        $extension = $file->guessClientExtension();
        $name = str_random(50);

        // Save the file information to database
        $image = new Image([
            'original_name' => $originalName,
            'object_name' => "{$name}.{$extension}"
        ]);
        $image->save();

        // Store the uploaded file to the public/uploads directory
        $file->storeAs('uploads', '', ['disk' => 'public']);

        return $image;
    }

    /**
     * List all images
     * @return LengthAwarePaginator
     */
    function listImages(): LengthAwarePaginator
    {
        return Image::with('tags')->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    /**
     * Add a tag to the image and return the tag model
     *
     * @param Image $image
     * @param string $tag
     * @return Tag
     */
    function tagImage(Image $image, string $tag): Tag
    {
        $tagModel = $this->tags->create($tag);

        $image->tags()->attach($tagModel);

        return $tagModel;
    }

    /**
     * List all images under one tag
     * @param Tag $tag
     * @return LengthAwarePaginator
     */
    function listImagesByTag(Tag $tag): LengthAwarePaginator
    {
        return $tag->images()
            ->with('tags')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }
}