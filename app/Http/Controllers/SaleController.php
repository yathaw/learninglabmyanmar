<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Course;
use Auth;
use App\Models\User;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->getRoleNames();
        $user_id = Auth::id();

        if($role[0] == 'Admin'){
            $sales = Sale::orderBy('id','DESC')->get();
            return view('sale.index',compact('sales'));
        }
        elseif($role[0] == 'Instructor'){
            $enrolls = Sale::whereHas('courses',function($q){
                        $q->where('course_sale.status',1)->leftjoin('course_instructor','course_instructor.course_id','=','course_sale.course_id')->leftjoin('instructors','course_instructor.instructor_id','=','instructors.id')->where('instructors.user_id',Auth::id());
                    })->where('sales.status',1)->orderBy('created_at','desc')->limit(8)->get();

            $courses = Course::whereHas('instructors',function($q){
                            $q->where('instructors.user_id',Auth::id());
                        })->get();

            return view('sale.index',compact('enrolls','courses'));
        }elseif($role[0] == 'Business'){
            $user = User::find(Auth::id());
            $company = $user->company->id;
            $enrolls = Sale::whereHas('courses',function($q) use ($company){
                        $q->where('course_sale.status',1)->leftjoin('course_instructor','course_instructor.course_id','=','course_sale.course_id')->leftjoin('instructors','course_instructor.instructor_id','=','instructors.id')->leftjoin('users','instructors.user_id','=','users.id')->where('users.company_id',$company);
                    })->where('sales.status',1)->orderBy('created_at','desc')->limit(8)->get();

            $courses = Course::whereHas('instructors',function($q) use ($company){
                            $q->leftjoin('users','users.id','=','instructors.user_id')->where('users.company_id',$company);
                        })->get();

            return view('sale.index',compact('enrolls','courses'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
       
        return view('sale.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }


    // remove sale course
    public function remove_sale_course(Request $request)
    {
        $sale_id = $request->sale_id;
        $course_id = $request->course_id;
        $sale = Sale::find($sale_id);
        $sale->courses()->detach($course_id);
        return "ok";
    }
    public function enrollment()
    {
       /* $enrolls = Sale::whereHas('courses',function($q){
            $q->where('course_sale.status',1);
        })->where('sales.status',1)->get();*/
        $role = Auth::user()->getRoleNames();
        $user_id = Auth::id();
       
        $enrolls = Sale::whereHas('courses',function($q){
            $q->where('course_sale.status',1);
        })->where('sales.status',1)->orderBy('created_at','desc')->limit(8)->get();

        $courses = Course::all();
        return view('account.enrollment',compact('enrolls','courses'));
       
    }

    public function enrollmentsearch(Request $request)
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $role = Auth::user()->getRoleNames();
        $user_id = Auth::id();

        if($role[0] == 'Admin'){
            $sale = Sale::whereHas('courses',function($q){
                $q->where('course_sale.status',1);
            })->where('sales.status',1)->whereDate('sales.created_at', '>=', $startdate)->whereDate('sales.created_at', '<=', $enddate)->with('user','courses')->get();

            return response()->json(['sales'=>$sale]);
        }elseif($role[0] == 'Instructor'){
            $sale = Sale::whereHas('courses',function($q){
                $q->where('course_sale.status',1)->leftjoin('course_instructor','course_instructor.course_id','=','course_sale.course_id')->leftjoin('instructors','course_instructor.instructor_id','=','instructors.id')->where('instructors.user_id',Auth::id());
            })->where('sales.status',1)->whereDate('sales.created_at', '>=', $startdate)->whereDate('sales.created_at', '<=', $enddate)->with('user','courses')->get();

            return response()->json(['sales'=>$sale]);
        }elseif($role[0] == 'Business'){
            $user = User::find(Auth::id());
            $company = $user->company->id;
            $sale = Sale::whereHas('courses',function($q) use ($company){
                $q->where('course_sale.status',1)->leftjoin('course_instructor','course_instructor.course_id','=','course_sale.course_id')->leftjoin('instructors','course_instructor.instructor_id','=','instructors.id')->leftjoin('users','instructors.user_id','=','users.id')->where('users.company_id',$company);
            })->where('sales.status',1)->whereDate('sales.created_at', '>=', $startdate)->whereDate('sales.created_at', '<=', $enddate)->with('user','courses')->get();

            return response()->json(['sales'=>$sale]);
        }           
    }

    public function coursefilter(Request $request)
    {
        $id = $request->id;
        $sale = Sale::whereHas('courses',function($q) use ($id){
            $q->where('course_sale.status',1)->where('course_sale.course_id',$id);
        })->where('sales.status',1)->with('user','courses')->get();
        $course = Course::find($id);
        return response()->json(['sales'=>$sale,'course'=>$course]);
    }
}
