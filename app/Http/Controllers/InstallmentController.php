<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installment;
use App\Models\Sale;
use Auth;
class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // course_sale pivot status
        $course_array = array();
        $course_id = explode(',',$request->course_id);
        // dd($course_id);
        if($request->hasfile('installment_photo')){
            $photo = time().'_'.$request->installment_photo->getClientOriginalName();
            $filepath = $request->file('installment_photo')->storeAs('bankphoto',$photo,'public');
            $path = '/storage/'.$filepath;

        };
        
        // dd($path);

        $update_course_status= 1;
        $request->validate([
                    'total' => 'required',
                    'installment_date' => 'required',
                    'payment_type' => 'required',
                ]);
        $sale_id = $request->sale_id;

        $installment = new Installment;
        $installment->amount = $request->total;
        $installment->type = $request->payment_type;
        $installment->paiddate = $request->installment_date;
        $installment->user_id = Auth::user()->id;
        $installment->sale_id = $sale_id;
        $installment->photo = $path;
        $installment->save();

        $sale = Sale::find($sale_id);

        $installment->courses()->attach($course_id);

        // change course_sale pivot status and all course status change
  
        $sale->courses()->updateExistingPivot($course_id,['status'=>$update_course_status]);

        // condition of course_sale piovt status == total sale course and one course status change
        
        foreach($sale->courses as $course){
            
        if($course->pivot->status == 1)
            {
                array_push($course_array, $course->id);
            }
        }

        
        $total_sale_course = count($sale->courses);
        $total_paid_course = count($course_array);
        // dd($total_sale_course.'/'.$total_paid_course);
        if($total_sale_course == $total_paid_course){
            $sale->status=1;
        }else{
            $sale->status=0;
        }
        
        $sale->save();
        

        return response()->json($installment);
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
