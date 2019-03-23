<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ImageController extends Controller {
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $imageName = request()->file->getClientOriginalName();
        request()->file->move(public_path('uploadimgs'), $imageName);
        return response()->json(['uploaded' => '/uploadimgs/' . $imageName]);
    }
}