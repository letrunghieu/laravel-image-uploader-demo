<?php
/**
 * Created by PhpStorm.
 * User: hieul
 * Date: 2/20/2019
 * Time: 12:57 AM
 */

namespace App\Http\Controllers;


use App\Contracts\ImagesContract;
use App\Contracts\ImageTaggingContract;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // List all images
    public function index(ImagesContract $imagesContract)
    {
        $images = $imagesContract->listImages();

        return view('images.index', compact('images'));
    }

    // Show a single image
    public function show(Image $image)
    {
        $image->load('tags');

        return view('images.show', compact('image'));
    }

    public function upload(Request $request, ImagesContract $imagesContract)
    {
        \Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,jpg,png'
        ])->validate();

        $file = $request->file('file');

        $image = $imagesContract->createFromUpload($file);

        return redirect()->back()->with(
            'success',
            __('The image :path is uploaded successfully', ['path' => $image->original_name])
        );
    }

    // Add new tag to an image
    public function addTagToImage(Request $request, ImageTaggingContract $imageTaggingContract, Image $image)
    {
        \Validator::make($request->all(), [
            'tag' => 'required'
        ])->validate();
        $tag = $request->get('tag');

        $newTag = $imageTaggingContract->tagImage($image, $tag);

        return redirect()->back()->with(
            'success',
            __('The image :path is tagged with ":tag"', ['path' => $image->original_name, 'tag' => $newTag->tag_name])
        );
    }
}
