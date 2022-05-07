<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Employee;
//use PDF;
use  Barryvdh\DomPDF\Facade as PDF;

class EmployeeController extends Controller
{
    public function showEmployees(){
      $employee = Employee::all();
      return view('index', compact('employee'));
    }
    // Generate PDF
    public function createPDF() {
       
        // retreive all records from db
        $data = Employee::all();
       
        // share data to view
        view()->share('employee',$data);
  
       // download PDF file with download method
        $pdf = PDF::loadView('pdf_view', compact($data));
        return $pdf->stream('pdf_file.pdf');


      }
}