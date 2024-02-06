<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function uploadFile(Request $request)
    {
        // it will store the file in the storage/app/avatars directory
        // it depends on the destination directory you want in store()
        $path = $request->file('avatar')->store('avatars');
        $data = [
            'path' => $path,
            'message' => 'File uploaded successfully'
        ];
        return response()->json($data, 200);
    }
}
