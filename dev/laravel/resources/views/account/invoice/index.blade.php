@extends('account.layouts.app')
@section('content')

@include('account.layouts.includes.datatables')

<div class="card">
    <div class="card-header">
        <h3>Order History</h3>
    </div>
    <div class="icon-and-text-button-demo">
        {{-- <a href="">
                    <button type="button" class="btn btn-primary waves-effect">
                            <i class="fa fa-plus-circle"></i>
                        <span>Add Account</span>
                    </button>
                </a> --}}
        <a href="">
            <button type="button" class="btn btn-warning waves-effect">
                <i class="fa fa-refresh"></i><span>{{ __('messages.Refresh') }}</span>
            </button>
        </a>

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
    //           
// $.fn.dataTable.Responsive.breakpoints.push({
//    name: 'mobilep', width: 320
// })
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
                                "ajax": "{{ route('account.get_invoice_data') }}",
                                "columns":[
                                    { "data": "id" },
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
                                //"dom": 'lBfrtip',
                                //"buttons": ['copy', 'csv', 'excel', 'pdf', 'print']

                             });
                        });
</script>



<hr />

@endsection