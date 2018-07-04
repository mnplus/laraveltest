<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
     $cust_data = $this->get_cust_data();
     return view('dyn_pdf')->with('cust_data', $cust_data);
    }

    function get_cust_data()
    {
     $cust_data = DB::table('listas')
         ->limit(5)
         ->get();
     return $cust_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $cust_data = $this->get_cust_data();
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:10px;" width="15%">Name</th>
    <th style="border: 1px solid; padding:10px;" width="15%">Last name</th>
    <th style="border: 1px solid; padding:10px;" width="15%">DOB</th>
    <th style="border: 1px solid; padding:10px;" width="15%">Phone</th>
    <th style="border: 1px solid; padding:10px;" width="20%">Email</th>
    <th style="border: 1px solid; padding:10px;" width="20%">Company Name</th>
   </tr>
     ';  
     foreach($cust_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->last_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->dob.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->phone.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->company_name.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
