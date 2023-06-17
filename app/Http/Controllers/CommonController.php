<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    //
    public function uploadImageWithPath(Request $request)
    {
        $fileName = microtime(true) . ".png";
        $filePath = $request->get('filePath');
        $file = $request->file;
        $file->move($filePath, $fileName);

        return $fileName;
    }

}