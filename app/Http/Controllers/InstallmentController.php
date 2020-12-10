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
        $array = array();
        
        // course_sale pivot status
        $course_array = array();
        // $course_id = json_decode($request->course_id);

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
        // $installment->course_id = $request->course_id;
        $installment->save();

        $sale = Sale::find($sale_id);
        // change course_sale pivot status and all course status change
        if(!$request->course_id){
            foreach($sale->courses as $course){
                array_push($array, $course->id);
            }
            $sale->status = 1;
            $sale->save();
            $sale->courses()->updateExistingPivot($array,['status'=>$update_course_status]);

        }


        // condition of course_sale piovt status == total sale course and one course status change
        if($request->course_id){

        $sale->courses()->updateExistingPivot($request->course_id,['status'=>$update_course_status]);
        foreach($sale->courses as $course){
            if($course->pivot->status == 1)
            {
                array_push($course_array, $course->id);
            }
        }
        
        
        $total_sale_course = count($sale->courses);
        $total_paid_course = count($course_array);
        if($total_sale_course == $total_paid_course){
            $sale->status=1;
        }else{
            $sale->status=0;
        }
        
        $sale->save();
        }

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
