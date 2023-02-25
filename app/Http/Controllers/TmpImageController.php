<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Cache\Store;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class TmpImageController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('images/tmp/' . $folder, $filename);

            TemporaryImage::create([
                'folder' => $folder,
                'file_name' => $filename
            ]);

            return $folder;
        }

        return '';
    }

    public function destroy()
    {
        $tmp_image = TemporaryImage::where('folder', request()->getContent())->first();

        if($tmp_image){
            File::deleteDirectory(storage_path('app/images/tmp/' . $tmp_image->folder));
            $tmp_image->delete();
            return response('');
        }
    }
}
