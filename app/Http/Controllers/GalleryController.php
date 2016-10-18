<?php
/**
 * Created by PhpStorm.
 * User: Kaan
 * Date: 10/17/2016
 * Time: 10:50 PM
 */

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;


class GalleryController extends Controller
{

    public function getGalleryList()
    {
        $galleries = Gallery::all();

        return view('gallery.gallery')->with('galleries', $galleries);
    }

    public function postGallery(Request $request)
    {
        $gallery = new Gallery();

        // validate the Request through the validation rules
        $this->validate($request, [
           $gallery->gallery_name => 'required|min:3'
        ]);




        // save a new Gallery
        $gallery->name = $request['gallery_name'];
        $gallery->created_by = 1;
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

    }
}