<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectCodeRequest;
use App\Models\Subject_Code;
use Illuminate\Http\Request;

class SubjectCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['course_code_list'] = Subject_Code::paginate(25);
        return view("admin.subjectcode.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.subjectcode.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectCodeRequest $request)
    {  $courseCode= new Subject_Code();
        $courseCode->course_code =$request->course_code;
        $courseCode->save();
        $notification =array(
            'message' => "Course Code Add Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/courses")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Subject_Code::find($id);
        if(!$courses){
        flash("No item Found")->error();
        return redirect('/courses');
        }
         $data['courses'] =$courses;
         return  view("admin.subjectcode.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectCodeRequest $request, $id)
    {
       
        $courses = Subject_Code::find($id);
        if(!$courses){
          return redirect('/courses');
        }
        $courses->course_code =$request->course_code;
        $courses->save();
        $notification =array(
            'message' => "Course Code Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/courses')->with($notification);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Subject_Code::find($id);
        if(!$courses){
          return redirect('/admin/subjects');
        }
        $courses->delete();
    $notification =array(
            'message' => " Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/courses')->with($notification);
    }
}
