<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;

class uploadController extends Controller
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
        $comments = Comment::latest('created_at')->get();
        return view('upload', ['comments' => $comments]);
    }

    public function show_file($course_id)
    {
        $file=DB::table('tbl_file')
                ->join('course_info','tbl_file.course_id','=','course_info.course_id')
                ->where('course_info.course_id',$course_id)
                ->get();

        $all_file=view('show_file')->with('file',$file);
        return view('layouts.app')->with('show_file',$all_file);
    }
}
