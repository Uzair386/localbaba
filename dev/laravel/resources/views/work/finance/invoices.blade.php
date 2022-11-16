@extends('work.layouts.app')


@section('content')


@include('work.layouts.includes.datatables')

<div class="card">
    <div class="card-header">
        <h5>&nbsp;Orders</h5>
    </div>
    <div class="icon-and-text-button-demo d-flex justify-content-between">
        <div class="pl-3">
            <select class="form-control filter" id="filter" style="font-size: inherit">
                <option @if(request()->get('filter') == null) selected @endif data-url="{{url('/work/finance/invoices')}}">Filter</option>
                <option @if(request()->get('filter') == 'paid') selected @endif data-url="{{url('/work/finance/invoices')}}?filter=paid">Paid</option>
                <option @if(request()->get('filter') == 'unpaid') selected @endif data-url="{{url('/work/finance/invoices')}}?filter=unpaid">Unpaid</option>
                <option @if(request()->get('filter') == 'cancelled') selected @endif data-url="{{url('/work/finance/invoices')}}?filter=cancelled">Cancelled</option>
                <option @if(request()->get('filter') == 'fulfilled') selected @endif data-url="{{url('/work/finance/invoices')}}?filter=fulfilled">Fulfilled</option>
                <option @if(request()->get('filter') == 'unfulfilled') selected @endif data-url="{{url('/work/finance/invoices')}}?filter=unfulfilled">Un Fulfilled</option>
                <option @if(request()->get('filter') == 'partially_fulfilled') selected @endif data-url="{{url('/work/finance/invoices')}}?filter=partially_fulfilled">Partially Fulfilled</option>
            </select>
        </div>

        <div>
            <a href="">
                <button type="button" class="btn btn-warning waves-effect">
                    <i class="fa fa-refresh"></i><span>Refresh</span>
                </button>
            </a>
            <a class="mr-3" href="{{ route('work.invoices.csv_export') }}">
                <button type="button" class="btn btn-success waves-effect">
                    <i class="fa fa-cloud-download"></i>
                    <span>Export</span>
                </button>
            </a>
        </div>

    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <table id="data_table" class="table table-striped table-bordered nowrap dataTable" role="grid"
                            aria-describedby="simpletable_info">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>User</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Phone</th>
                                    <!--<th>Invoice #</th>-->
                                    <th>Amount</th>
                                    <th>Fulfillment Status</th>
                                    <th>Tracking Code</th>
                                    <th>Payment Status</th>
                                    <th>Date</th>
                                    <th>More</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<style>
    div.container {
        width: 100%;
    }

    .btn i {
        margin-right: 0%;
    }
</style>


<script type="text/javascript">
    //get
$(document).ready(function() {
        $('#data_table').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "language": 
                    {          
                    "processing": "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i>",
                    },
        "ajax": "{{ route('work.get_invoice_data',[request()->get('filter')]) }}",
        "columns":[
            { "data": "id" },
            { "data": "invoice_customer" },
            { "data": "customer_name" },
            { "data": "customer_email" },
            { "data": "customer_phone" },
            //{ "data": "invoice_number" },
            { "data": "invoice_amount" },
            { "data": "fulfillment_status" },
            { "data": "tracking_code" },
            { "data": "invoice_status" },
            { "data": "invoice_date"},
            { "data": "action","searchable":false,"orderable":false}
        ],
        order:[ [0, 'desc'] ],
        //"dom": 'Bfrtip',
        //"buttons": ['pageLength','copy', 'csv', 'excel', 'pdf', 'print']

        });
});
    $('.filter').on('change', function () {
        window.location.href = $(this).children("option:selected").data('url')
    });
</script>


<hr />

@endsection