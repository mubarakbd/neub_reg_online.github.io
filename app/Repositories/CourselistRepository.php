<?php

namespace App\Repositories;

use App\Interfaces\ICourselistRepository;
use App\Models\Coursedetalis;

class CourselistRepository extends BaseRepository implements ICourselistRepository
{
  

    public function __construct(Coursedetalis $model)
    {
        parent::__construct($model);
    }

    public function CreateCourse($request)
    {
        try{
         $courslists = $this->model;
        $courslists->subject_id = $request->subject_id;
        $courslists->subject_code_id = $request->subject_code_id;
        $courslists->subject_credit_id = $request->subject_credit_id;
        $courslists->save();
        }catch(\Throwable $th) {
            flash("Something is wrong")->error();
         }
    }

    public function UpdateCourse($request, $id)
    {
       $courselist = $this->model::find($id);
        if(!$courselist){
            return false;
        }
        $courselist->subject_id =$request->subject_id;
        $courselist->subject_code_id =$request->subject_code_id;
        $courselist->subject_credit_id=$request->subject_credit_id;
        $courselist->save();
        return true;
    }


}
