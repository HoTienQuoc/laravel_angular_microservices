<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Requests\ImageUploadRequest;

class ImageController extends Controller
{
    public function upload(ImageUploadRequest $request){
        $file = $request->file('image');
        $name = Str::random(10);
        $url = Storage::putFileAs('images',$file,$name.".".$file->extension());
        return [
            'url'=>env("APP_URL")."/".$url
        ];
    }
}
