<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Models\Coursedetalis;
use App\Models\Gradpoint;
use App\Models\Group;
use App\Models\Result;
use App\Models\Semester;
use Illuminate\Http\Request;

class ResultInfocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['resultlist'] = Result::get();
      return view("admin.resultinfo.index",$data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $data['grouplist'] = Group::get();
        $data['semester_list'] = Semester::get();
        $data['courselist'] =Coursedetalis::get();
        $data['gradlist'] = Gradpoint::get();
        return view('admin.resultinfo.credit',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request)
    { 
        
        $res = new Result();
        $res ->student_name =$request->student_name;
        $res->student_reg =$request->student_reg;
        $res->group_id =$request->group_id;
        $res->letter_grad =$request->letter_grad;
        $res->grad_point =$request->grad_point;
        $res->semester_id =$request->semester_id;
        $res->subject_id = $request->subject_id;
        $res->subject_code_id = $request->subject_code_id;
        $res->subject_credit_id = $request->subject_credit_id;
        $res->save();
        $notification =array(
            'message' => "Courses Information Insert Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/resultinfos")->with($notification);

   

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
        $results = Result::find($id);
        if(!$results){
          return redirect('/resultinfos');
        }

        $data['semester_list'] =Semester::get();
        $data['gradlist'] = Gradpoint::get();
        $data['courselist'] =Coursedetalis::get();
        $data['grouplist'] =Group::get();
        $data['results'] = $results;
        return view("admin.resultinfo.edit",$data);
       
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
        $results = Result::find($id);
        if(!$results){
          return redirect('/resultinfos');
        }
        
        $results->student_name =$request->student_name;
        $results->student_reg =$request->student_reg;
        $results->save();
        $notification =array(
            'message' => "Result Rotuin  Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/resultinfos')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $results = Result::find($id);
        if(!$results){
          return redirect('/resultinfos');
        }
        $results->delete();
    $notification =array(
            'message' => "Course Delete Successfully",
            'alert-type' => "error"
        );
        return redirect("/admin/resultinfos")->with($notification);
    }

}
