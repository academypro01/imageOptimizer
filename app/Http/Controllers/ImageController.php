<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $image = $request->file('image');
        $name = (explode('.', $image->getClientOriginalName()))[0].uniqid().'__Optimized.'.$image->getClientOriginalExtension();
        $input['image'] = $name;

        $imageFile = Image::make($image->getRealPath());

        $width = ($request->width == null) ? $imageFile->width() : $request->width;
        $height = ($request->height == null) ? $imageFile->height() : $request->height;

        $imageFile->resize($width, $height)
            ->save(public_path('uploads').DIRECTORY_SEPARATOR.$input['image'], (100 - $request->compress));

        return back()
            ->with('status', 'Image Optimized, now you can download it.')
            ->with('filename', $input['image']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
