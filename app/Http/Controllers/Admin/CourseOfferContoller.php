<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseOfferRequest;
use App\Interfaces\ICourseOfferRepository;
use App\Models\Coursedetalis;
use App\Models\CourseList;
use App\Models\CourseOffer;
use App\Models\Facilities;
use App\Models\Gradpoint;
use App\Models\Group;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseOfferContoller extends Controller
{
    // protected $courseofferRepo;

    // public function __construct(ICourseOfferRepository $courseofferRepo)
    // {
    //     $this->courseofferRepo = $courseofferRepo;
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        
        $data['courseofferlist'] = CourseOffer::get();
        //   $data['courseofferlist'] =$this->courseofferRepo->get();
        return view("admin.courseoffer.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['semester_list'] = Semester::get();
        $data['courselist'] = Coursedetalis::get();
        return view("admin.courseoffer.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseOfferRequest $request)
    {
        $subjectCount = count($request->subject_id);
	    	if ($subjectCount !=NULL) {
	    		for ($i=0; $i <$subjectCount ; $i++) { 
	    			$courseoffer = new CourseOffer();
	    			$courseoffer->semester_id = $request->semester_id;
	    			$courseoffer->subject_id = $request->subject_id[$i];
	    			$courseoffer->subject_code_id = $request->subject_code_id[$i];
	    			$courseoffer->subject_credit_id = $request->subject_credit_id[$i];
	    			$courseoffer->save();

	    		} // End For Loop
	    	}// End If Condition
        // $this->courseofferRepo->CreateCoruseOffer($request);

            $notification =array(
                'message' => "Courses Information Insert Successfully",
                'alert-type' => "success"
            );
            return redirect("/admin/coursoffers")->with($notification);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
