<?php
/**
 * Created by PhpStorm.
 * User: Kaan
 * Date: 10/17/2016
 * Time: 10:50 PM
 */

namespace App\Http\Controllers;

use App\Gallery;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;


class GalleryController extends Controller
{


    public function getIndex()
    {
        if (Auth::check()) {
            return redirect()->route('get.gallery');
        }

        return view('users.login');
    }

    public function getGalleryList()
    {
        $galleries = Gallery::all();

        return view('gallery.gallery')->with(['galleries' => $galleries]);
    }

    public function postGallery(Request $request)
    {
        $gallery = new Gallery();

        // validate the Request through the validation rule
        $this->validate($request, [
            'gallery_name' => 'required|min:3'
        ]);

        // save a new Gallery
        $gallery->name = $request['gallery_name'];
        $gallery->created_by = Auth::user()->id;
        $gallery->published = 1;
        $gallery->save();

        return redirect()->back();
    }

    public function getGalleryPics($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('gallery.gallery-view')->with('gallery', $gallery);
    }

    public function postImageUpload(Request $request)
    {
        // get the fie from post request
        $file = $request->file('file');

        // set my file name
        $filename = uniqid() . $file->getClientOriginalName();

        // move the file to correct location
        if (!file_exists('gallery/images')){
            mkdir('gallery/images', 0777, true);
        }

        $file->move('gallery/images', $filename);

        if (!file_exists('gallery/images/thumbs')){
            mkdir('gallery/images/thumbs', 0777, true);
        }


        $thumb = Image::make('gallery/images/' . $filename)->resize(240,160)->save('gallery/images/thumbs/' . $filename, 60);

        // save the image details into the database
        $gallery = Gallery::find($request->input('gallery_id'));

        $image = $gallery->images()->create([
            'gallery_id' => $request->input('gallery_id'),
            'file_name'  => $filename,
            'file_size'  => $file->getClientSize(),
            'file_mime'  => $file->getClientMimeType(),
            'file_path'  => 'gallery/images/' . $filename,
            'created_by' => Auth::user()->id
        ]);

        return $image;
    }

    public function postDeleteGallery($id)
    {
        // load the gallery
        $currentGallery = Gallery::find($id);

        //check ownership
        if ($currentGallery->created_by != Auth::user()->id){
            abort('403', 'You are not allowed to delete this gallery');
        }

        // get the images
        $images = $currentGallery->images();

        // delete the images
        foreach ($currentGallery->images as $image){
            unlink(public_path($image->file_path));
            unlink(public_path('gallery/images/thumbs/' . $image->file_name));
        }

        // delete the DB records
        $images->delete();

        $currentGallery->delete();

        return redirect()->back();
    }
}