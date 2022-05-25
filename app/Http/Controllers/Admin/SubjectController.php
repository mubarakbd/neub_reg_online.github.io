<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['subject_list'] = Subject::paginate(25);
        return view("admin.subject.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view("admin.subject.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $subject = new Subject();
        $subject->subject_name =$request->subject_name;
        $subject->save();
        $notification =array(
            'message' => "Group Updated Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/subjects")->with($notification);
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
        $subjects = Subject::find($id);
        if(!$subjects){
        flash("No item Found")->error();
        return redirect('/subjects');
        }
         $data['subjects'] =$subjects;
         return  view("admin.subject.edit",$data);

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $subjects = Subject::find($id);
        if(!$subjects){
          return redirect('/subjects');
        }
        $subjects->subject_name =$request->subject_name;
        $subjects->save();
        $notification =array(
            'message' => "Subject Name Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/subjects')->with($notification);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjects = Subject::find($id);
        if(!$subjects){
          return redirect('/admin/subjects');
        }
        $subjects->delete();
    $notification =array(
            'message' => "Group Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/subjects')->with($notification);
    }
}
