<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Photo;


class PhotoController extends Controller
{
    //

public function index()
{
    $photos = Photo::latest()->get();

    return view('gallery',compact('photos'));
}

public function store(Request $request)
{

$image = $request->file('image')->store('photos','public');

Photo::create([
'image'=>$image,
'photographer_name'=>$request->photographer_name,
'type'=>$request->type
]);

return redirect()->route('gallery');

}

public function destroy($id)
{

Photo::findOrFail($id)->delete();

return redirect()->route('gallery');

}


}
