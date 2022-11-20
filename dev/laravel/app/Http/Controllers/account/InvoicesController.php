<?php

namespace App\Http\Controllers\account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Invoice;
use App\Credit;
use App\Setting;
use App\Gateway;
use App\Child_Invoice;
use Session;
use DataTables;
use PDF;
use Dompdf\Dompdf;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
                    $this->middleware('auth');
     }
    public function index()
    {
      $user = Auth::user();
      return view('account.invoice.index')
      ->with('user',$user);
    }
    ////////Get DT //////////////////////////////////
    public function get_invoice_data(){
  $user = Auth::user();
  $invoices = Invoice::where('user_id',$user->id)->get();



    return Datatables::of($invoices)
        ->addColumn('id', function($invoices) {
            return "#$invoices->id";
        })
        ->addColumn('customer_name', function($invoices) {
            return "$invoices->name";
        })
        ->addColumn('customer_email', function($invoices) {
            return "$invoices->email";
        })
        ->addColumn('customer_phone', function($invoices) {
            return "$invoices->phone";
        })
        ->addColumn('fulfillment_status', function($invoices) {
            return "$invoices->fulfillment_status";
        })
        ->addColumn('tracking_code', function($invoices) {
            return "$invoices->tracking_code";
        })
        ->addColumn('invoice_number', function($invoices) {
            return "<b>$invoices->invoice_number</b>";
        })
        ->addColumn('invoice_amount', function($invoices) {
            $settings =Setting::first();
            return $settings->currency->symbol.''.number_format($invoices->total_amount_with_tax,2);
        })
        ->addColumn('invoice_date', function($invoices) {
            // $invoices_date = date('d-m-Y', strtotime($invoices->date));
            $invoices_date = \Carbon\Carbon::parse($invoices->created_at)->format('d-M-y');
            return "$invoices_date";
        })
        ->addColumn('invoice_status', function($invoices) {
            if($invoices->payment_method != 'Cash On Delivery') {
                return '<a href="" class="btn btn-success btn-xs disabled" disabled="disabled" title="Invoice Has Been Approved " >Paid</a>';
            }
            else {
                return '<a href="" class="btn btn-warning btn-xs disabled" disabled="disabled" title="Invoice is Pending Approval " >Unpaid COD</a>';
            }
        })
    ->addColumn('action', function($invoices) {
      return '
      <a href="'.route('account.invoice.csv',$invoices->id).'" class="btn waves-effect waves-dark btn-inverse btn-outline-inverse btn-icon" title="'.__('messages.Download CSV').'"><i class="fa fa-download"></i></a>
      <a href="'.route('account.invoice.view',$invoices->id).'" class="btn waves-effect waves-dark btn-primary btn-outline-primary btn-icon" title="'.__('messages.View Invoice').'"><i class="fa fa-eye"></i></a>';
                })
    ->rawColumns(['invoice_number','invoice_amount','invoice_date','invoice_status','action'])
      // onclick="return confirm('Are you sure you want to Remove?');"
    ->make(true);
	}

    public function csv($id)
    {
      $user = Auth::user();
      $invoice = Invoice::find([$id]);//for csv
      $invoice_sec = Invoice::find([$id])->first();//for security
      if($user->id !== $invoice_sec->user_id){ //in this case strict !== works 
        Session::flash('warning', __('messages.Unauthorized'));
        return redirect('/account/invoices');
      }

     $csvExporter = new \Laracsv\Export();
     $csvExporter->build($invoice, [
                                  'invoice_number',
                                  'payment_method',
                                  'total_amount_with_tax',
                                  'status',
                                  'created_at',

                                  ])->download();

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function view($id)
    {
      $user = Auth::user();
      $value = substr( $id, 0, 3 ) === "INV";

      @$invoice = $value == 1 ? Invoice::where('invoice_number',$id)->first() :  Invoice::find([$id])->first();
      if($user->id != $invoice->user_id){
        Session::flash('warning', __('messages.Unauthorized'));
        return redirect('/account/invoices');
        // return redirect()->route('account.user.profile');
      }

      // $sub_invs = Child_Invoice::where('invoice_number',$invoice->invoice_number)->get();
      $sub_invs = $invoice->child;
      $settings=Setting::first();
      $gateway = Gateway::first();
      $invoice_user = Invoice::find($invoice->id)->user;
    return view('account.invoice.details')
    ->with('invoice',$invoice)
    ->with('user',$user)
    ->with('settings',$settings)
    ->with('gateway',$gateway)
    ->with('sub_invs',$sub_invs)
    ->with('invoice_user',$invoice_user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


}
