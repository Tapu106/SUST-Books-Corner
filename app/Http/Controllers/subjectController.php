<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\up;
use DB;

class subjectController extends Controller
{
    /**
     * Create a new controller instance.
     *`
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
    public function index($course_type_id)
    {
        $course=DB::table('course_info')
                ->join('tbl_course_type','course_info.course_type_id','=','tbl_course_type.course_type_id')
                ->where('tbl_course_type.course_type_id',$course_type_id)
                ->get();

        $all_course=view('subject')->with('course',$course);
        return view('layouts.app')->with('subject',$all_course);
    }

    public function storeBook(Request $request){
            $validatedData = $request->validate([
            'file' => 'required',
            'course_id'=>'required',
            'depatment'=>'required',
            'semester'=>'required',
            'type'=>'required',
            'extension'=>'required'
    ]);

            $upload = new up;
            $upload->course_id=$request->course_id;
            $upload->department=$request->department; 
            $upload->semester=$request->semester;
            $upload->type=$request->type; 
            $upload->extension=$request->extension;




        if ($request->hasFile('file')) {
            $file1 = $request->file('file');
            $filename1 = time() . '_' . rand() . '.' . $file1->getClientOriginalName();
            $location = public_path('files/' . $filename1);
            $file1->move($location, $filename1);

            $upload->file = $filename1;
        }

        $upload->save();
        return view('books');
    }
}
