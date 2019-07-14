<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;

class typeController extends Controller
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
    public function index($semester_id)
    {
         $type=DB::table('tbl_course_type')
                    ->join('tbl_semester','tbl_course_type.semester_id','=','tbl_semester.semester_id')
                    ->where('tbl_semester.semester_id',$semester_id)
                    ->get();

        $type_by_semester=view('type')->with('type',$type);
        return view('layouts.app')->with('type',$type_by_semester);
    }
}
