<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pomirleanu\GifCreate;

class GifApiController extends Controller
{
    
    public function __construct(){
    }

    public function index(Request $request)
    {
        try {
            $image1 = file_get_contents(storage_path('app/public/image1.jpg'));
            $image2 = file_get_contents(storage_path('app/public/image2.jpg'));
            $image3 = file_get_contents(storage_path('app/public/image3.jpg'));
            $frames = array($image1, $image2, $image3);
            $durations = array(30, 30, 30);

            $gif = new GifCreate\GifCreate();
            $gif->create($frames, $durations);
            // $gif = $gif->get();
            // header("Content-type: image/gif");
            $gif->save("animated.gif");
            // header("Content-type: image/gif");
            // dd($gif);
            // echo $gif;
            // dd($image);
            // $this->bookingRepository->pushCriteria(new RequestCriteria($request));
        } catch (Exception $e) {
            response()->json([
                'message' => 'Create gif image failed!'], 404);
            }
    }

}
