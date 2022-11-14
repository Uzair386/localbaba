@extends('work.layouts.app')


@section('content')

@include('work.layouts.includes.datatables')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="card">
  <h2 class="text-center my-4"> <i class="fa fa-money"></i> Income Totals @if(request()->get('user_id') != null) For user: {{$user->name }}@endif</h2>
  <!-- Invome Table -->
  <div class="body table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
      <tr>
        <th>Supplier Amount</th>
        <th>Cart</th>
        <th>(-) Coupons</th>
        <th>Before TAX</th>
        <th>(+) Tax</th>
        <th>After TAX</th>
        <th>Profit</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>{!!$settings->currency->symbol!!} {{number_format($amount_supplier,2)}}</td>
          <td>{!!$settings->currency->symbol!!} {{number_format($amount_initial,2)}}</td>
          <td>{!!$settings->currency->symbol!!} {{number_format($amount_coupon,2)}}</td>
          <td>{!!$settings->currency->symbol!!} {{number_format($amount_without_tax,2)}}</td>
          <td>{!!$settings->currency->symbol!!} {{number_format($amount_tax,2)}}</td>
          <td>{!!$settings->currency->symbol!!} {{number_format($amount_with_tax,2)}}</td>
          <td>{!!$settings->currency->symbol!!} {{number_format($amount_profit,2)}}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Income Table end -->
</div>


<div class="card"><br>
  <div class="card-header">
    <h3>Income</h3>
  </div>
  <div class="d-flex justify-content-between">
    <div>

    </div>
    <form class="example" action="" style="margin:auto;max-width:300px">
      <input type="text" placeholder="Search Order#" name="query">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <div class="mr-2">
      <select class="form-control cart66-select" id="user_id"  name="user_id" style="font-size: inherit">
        <option @if(request()->get('user_id') == null) selected @endif data-url="{{url('/work/finance/income')}}">
          {{request()->get('user_id') == null ? 'Filter by user' : 'All Users'}}</option>
        @foreach($users as $user)
          <option @if(request()->get('user_id') == $user->id) selected @endif data-url="{{url('/work/finance/income')}}?user_id={{$user->id}}">
            {{$user->name}}
          </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-9">
      <h6 class="result"><b>Query:</b> {{$query}}</h6>
    </div>
    <div class="col-md-3">
      <h6 class="result"><b>Total</b> {{$invoices->total()}} Showing {{$invoices->count()}} results</h6>
    </div>
  </div>

  <div class="body table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
        <tr>
          <th>Date</th>
          <th>Order</th>
          <th>User</th>
          <th>Initial Cart</th>
          <th>Coupon</th>
          <th>Profit</th>
          <th>Amount</th>
          <th>Tax</th>
          <th>Amount +Tax</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>
        <?php $count = 0;?>
        @foreach($invoices as $invoice)
        <?php
                                $count ++;
                                
                              ?>
        <tr>
          <td>{{$invoice->created_at->toDateString()}}</td>
          <td><b>#{{$invoice->id}}</b></td>
          <td>{{$invoice->user->name}}</td>
          <td>{!!$settings->currency->symbol!!}{{number_format($invoice->initial_amount,2)}}</td>
          <td>{!!$settings->currency->symbol!!}{{number_format($invoice->coupon_amount,2)}}</td>
          <td>{!!$settings->currency->symbol!!}{{number_format($invoice->amount_gain,2)}}</td>
          <td>{!!$settings->currency->symbol!!}{{number_format($invoice->total_amount_without_tax,2)}}</td>
          <td>{!!$settings->currency->symbol!!}{{number_format($invoice->tax_amount,2)}}</td>
          <td>{!!$settings->currency->symbol!!}{{number_format($invoice->total_amount_with_tax,2)}}</td>
          <td>
            <a href="{{route('work.invoice.view',$invoice->id)}}" class="btn btn-primary btn-xs" title="View"><i
                class="fa fa-eye"></i></a>
          </td>
        </tr>
        <!-- sub panel start -->
        <?php
                              $sub_invoices = $invoice->child;
                              $confirmation          = '\'Do you want to proceed? \'';
                              ?>
        <tr>
          <td colspan="6">
            <div class="panel panel-primary">
              <div class="panel-heading" role="tab" id="headingOne_{{$count}}">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion_{{$count}}"
                    href="#collapseOne_{{$count}}" aria-expanded="false" aria-controls="collapseOne_{{$count}}"
                    class="collapsed">
                    --------------------- Breakdown -----------------<i class="fa fa-angle-down"></i>
                </h4></a>
              </div>
              <div id="collapseOne_{{$count}}" class="panel-collapse collapse" role="tabpane{{$count}}"
                aria-labelledby="headingOne_{{$count}}" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                  <!-- sub table start -->
                  <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                      <thead>
                        <tr>
                          <th>Supplier</th>
                          <th>Product</th>
                          <th>Initial Cart</th>
                          <th>Coupon</th>
                          <th>Profit</th>
                          <th>Amount</th>
                          <th>Tax</th>
                          <th>Amount+[Tax]</th>
                          <th>CSV</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- start loop -->
                        @foreach($sub_invoices as $sub_invoice)
                        <tr>
                          <td>{{$sub_invoice->supplier}}</td>
                          <td>{!! strip_tags(str_limit($sub_invoice->product_name, $limit = 20, $end = '...')) !!} </td>
                          <td>{!!$sub_invoice->currency_symbol!!}{{number_format($sub_invoice->initial_amount,2)}}</td>
                          <td>{!!$sub_invoice->currency_symbol!!}{{number_format($sub_invoice->coupon_amount,2)}}</td>
                          <td>{!!$sub_invoice->currency_symbol!!}{{number_format($sub_invoice->amount_gain,2)}}</td>
                          <td>{!!$sub_invoice->currency_symbol!!}{{number_format($sub_invoice->price_without_tax,2)}}
                          </td>
                          <td>{!!$sub_invoice->currency_symbol!!}{{number_format($sub_invoice->tax_amount,2)}}</td>
                          <td>{!!$sub_invoice->currency_symbol!!}{{number_format($sub_invoice->price_with_tax,2)}}</td>
                          <td><a href="{{route('work.income.sub.csv',$sub_invoice->id)}}" class="btn btn-danger btn-xs"
                              title="Download CSV"><i class="fa fa-upload" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                        <!-- End loop -->
                      </tbody>
                    </table>
                  </div>
                  <!-- sub table end -->

                </div>
              </div>
            </div>
          </td>
        </tr>
        <!-- sub panel end -->
        @endforeach
      </tbody>
    </table>
    {{$invoices->appends(request()->query())->links()}}

  </div>

</div>
<style>
  form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }

  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }

  form.example button:hover {
    background: #0b7dda;
  }

  form.example::after {
    content: "";
    clear: both;
    display: table;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    background-color: transparent !important;
    padding-top: 0px !important;
  }

</style>
<script>
  $('#user_id').on('change', function () {
    window.location.href = $(this).children("option:selected").data('url')
  });
  $(document).ready(function() {
    $('#user_id').select2();
  });
</script>
<hr />

@endsection