<?php
namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
 use DB;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;
 session_start();

class departmentController extends Controller
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
        $department=DB::table('tbl_department')
                    ->get();

        $all_department=view('Department')->with('department',$department);
        return view('layouts.app')->with('Department',$all_department);
    }
    public function add_department()
    {
        return view('add_department');
    }
     public function save_department(Request $request)
    {
        $data=array();
        
        $data['department_name']=$request->department_name;
        
        DB::table('tbl_department')->insert($data);
        Session::put('message','Department added successfully  !!!');
        return Redirect::to('/add_department');
    }

    public function add_semester()
    {
        return view('add_semester');
    }

    public function save_semester(Request $request)
    {
        $data=array();
        
        $data['semester_name']=$request->semester_name;
        $data['department_id']=$request->department_id;
        
        DB::table('tbl_semester')->insert($data);
        Session::put('message','Semester added successfully  !!!');
        return Redirect::to('/add_semester');
    }

    public function add_course()
    {
        return view('add_course');
    } 


    public function save_course(Request $request)
    {
        $data=array();
        
        $data['course_code']=$request->course_code;
        $data['department_id']=$request->department_id;
        $data['semester_id']=$request->semester_id;
        $data['course_type_id']=$request->course_type_id;
        
        DB::table('course_info')->insert($data);
        Session::put('message','Course added successfully  !!!');
        return Redirect::to('/add_course');
    }

     public function add_course_type()
    {
        return view('add_course_type');
    } 


    public function save_course_type(Request $request)
    {
        $data=array();
        
         $data['course_type_name']=$request->course_type_name;
        $data['department_id']=$request->department_id;
        $data['semester_id']=$request->semester_id;
        
        DB::table('tbl_course_type')->insert($data);
        Session::put('message','Course Type added successfully  !!!');
        return Redirect::to('/add_course_type');
    }

     public function add_file()
    {
        return view('add_file');
    } 


    public function save_file(Request $request)
    {
        $data=array();
       
        $data['file_name']=$request->file_name;
        $data['course_type_id']=$request->course_type_id;
        $data['course_id']=$request->course_id;
        $data['semester_id']=$request->semester_id;
        $data['department_id']=$request->department_id;
       
       
        $file=$request->file('file_any');
        if($file){
            $file_name=str_random(20);
            $ext=strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='new_files/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);



            if($success){
                $data['file']=$file_url;
                DB::table('tbl_file')->insert($data);
                Session::put('message','file saved succesfully');
                return Redirect::to('/add_file');

                Session::put('ext',$ext);
            }
        }

        $data['file']='';
        DB::table('tbl_file')->insert($data);
        Session::put('message','File saved succesfully');
        return Redirect::to('/add_file');
    }

    

    public function show_semester($department_id)
    {
        $semester=DB::table('tbl_semester')
                    ->join('tbl_department','tbl_semester.department_id','=','tbl_department.department_id')
                    ->where('tbl_department.department_id',$department_id)
                    ->get();

        $semester_by_department=view('session')->with('semester',$semester);
        return view('layouts.app')->with('session',$semester_by_department);

    }

    public function download($uuid) {

        $file = File::where([
            ['uuid', '=', $uuid],
            ['created_by_id', '=', Auth::getUser()->id]
            ])->first();

        $media = Media::where('model_id', $file->id)->first();
        $pathToFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $file->id . DIRECTORY_SEPARATOR . $media->file_name );

        return Response::download($pathToFile);
    }

}
