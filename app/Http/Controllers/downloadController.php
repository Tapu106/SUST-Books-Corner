<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;
use App\File;
use Spatie\MediaLibrary\Media;


class downloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function download($file)
    {
        $file = File::where([
            ['file', '=', $file],
            ])->first();

        $media = Media::where('file_id', $file->id)->first();
        $pathToFile = storage_path('app' . DIRECTORY_SEPARATOR . 'new_files' . DIRECTORY_SEPARATOR . $file->id . DIRECTORY_SEPARATOR . $media->file_name );

        return Response::download($pathToFile);
    }
}
