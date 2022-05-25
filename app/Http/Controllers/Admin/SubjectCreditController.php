<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectCreditRequest;
use App\Models\Subject_Credit;
use Illuminate\Http\Request;

class SubjectCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['credit_list'] = Subject_Credit::orderby('id')->paginate(20);
        return view("admin.credit.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.credit.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectCreditRequest $request)
    {  
     
        $credits = new Subject_Credit();
        $credits->course_credit = $request->course_credit;
        $credits->save();
        $notification =array(
            'message' => "Credit Insert Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/credits")->with($notification);
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
        $credits = Subject_Credit::find($id);
        if(!$credits){
        flash("No item Found")->error();
        return redirect('/credits');
        }
         $data['credits'] =$credits;
         return  view("admin.credit.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectCreditRequest $request, $id)
    {
        $credits = Subject_Credit::find($id);
        if(!$credits){
          return redirect('/credits');
        }
        $credits->course_credit =$request->course_credit;
        $credits->save();
        $notification =array(
            'message' => "Course Credit Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/credits')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credits = Subject_Credit::find($id);
        if(!$credits){
          return redirect('/admin/credits');
        }
        $credits->delete();
    $notification =array(
            'message' => "Group Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/credits')->with($notification);
    }
}
