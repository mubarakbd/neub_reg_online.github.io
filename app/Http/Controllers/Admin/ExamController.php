<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Models\Coursedetalis;
use App\Models\Exam;
use App\Models\Semester;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['examlist'] = Exam::get();
        return view("admin.exam.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['courselist'] = Coursedetalis::get();
        $data['semester_list'] = Semester::get();
        return view("admin.exam.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        $exam = new Exam();
        $exam->semester_id =$request->semester_id;
        $exam->subject_id =$request->subject_id;
        $exam->exam_date =$request->exam_date;
        $exam->room=$request->room;
        $exam->save();

        $notification =array(
            'message' => "Routin Information Insert Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/exams")->with($notification);
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
        $exam = Exam::find($id);
        if(!$exam){
        flash("No item Found")->error();
        return redirect('/courselists');
        }
        $data['courselist'] = Coursedetalis::get();
     
         $data['exam'] =$exam;
         return  view("admin.exam.edit",$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
        if(!$exam){
          return redirect('/exams');
        }
        $exam->exam_date =$request->exam_date;
     
        $exam->room =$request->room;
        $exam->save();
        $notification =array(
            'message' => "Exam Rotuin  Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/exams')->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        if(!$exam){
          return redirect('/exams');
        }
        $exam->delete();
    $notification =array(
            'message' => " Exam Routin Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/exams')->with($notification);
    }

    
}
