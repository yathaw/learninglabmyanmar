<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderBy('id','DESC')->get();

        return view('sale.index',compact('sales'));
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
        $sale_coures=array();

        foreach ($sale->courses as $course) {

            if($course->pivot->status == 1){
                array_push($sale_coures, $course->id);
            }
        }
        // dd( count($sale->courses.'++++'. count($sale_coures) ));


       
            if(count($sale->courses) == 0){

                $sale->delete();
                return 'delete';

            }
            if(count($sale->courses) == count($sale_coures)){
                $sale->status = 1;
                $sale->save();
            }

                
                return "ok";
            

            

    }

    public function enrollment()
    {
       /* $enrolls = Sale::whereHas('courses',function($q){
            $q->where('course_sale.status',1);
        })->where('sales.status',1)->get();*/
        
        $enrolls = Sale::whereHas('courses',function($q){
            $q->where('course_sale.status',1);
        })->where('sales.status',1)->orderBy('created_at','desc')->limit(8)->get();

        return view('account.enrollment',compact('enrolls'));
    }

    public function enrollmentsearch(Request $request)
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $sale = Sale::whereHas('courses',function($q){
                $q->where('course_sale.status',1);
            })->where('sales.status',1)->whereDate('sales.created_at', '>=', $startdate)->whereDate('sales.created_at', '<=', $enddate)->with('user','courses')->get();

        return response()->json(['sales'=>$sale]);        
    }
}
