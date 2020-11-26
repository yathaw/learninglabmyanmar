<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursecountController extends Controller
{
    //
  function coursecount()
  {
    return view('coursecountinstructor');
  }

  function revenuereport()
  {
    return view('revenuereportinstructor');
  }
}
