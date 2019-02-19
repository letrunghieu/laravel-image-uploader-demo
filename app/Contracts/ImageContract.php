<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/19/2019
 * Time: 11:51 PM
 */

namespace App\Contracts;


use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

interface ImageContract
{
    /**
     * Create a new image from an uploaded file
     * @param UploadedFile $file
     * @return Image
     */
    function createFromUpload(UploadedFile $file): Image;

    /**
     * List all images
     * @return LengthAwarePaginator
     */
    function listImages(): LengthAwarePaginator;
}