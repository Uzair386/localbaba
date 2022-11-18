@extends('account.layouts.app')
@section('content')

<!-- CPU Usage -->
<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h5>
                    <font color="red">{{ __('messages.Account') }}</font>
                </h5>
            </div>
            <div class="row card-block">
                <div class="col-md-12">
                    <ul class="list-view">
                        <li>

                            {{-- customization --}}
                            <div class="row">



                                <div class="col-xl-6 col-md-12">
                                    <div class="card comp-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Total orders placed</h6>
                                                    <h3 class="f-w-700 text-c-blue">
                                                        {{$invoices_count}}
                                                        <div class="number count-to" data-from="0"
                                                            data-to="{{$invoices_count}}" data-speed="15"
                                                            data-fresh-interval="20"></div>
                                                    </h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-align-justify bg-c-blue"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="card comp-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Amount of sales value</h6>
                                                    <h3 class="f-w-700 text-c-yellow">
                                                        {!!$settings->currency->symbol !!}{{$amount_spent}}
                                                    </h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-money bg-c-yellow"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-12">
                                    <div class="card comp-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Fulfilled</h6>
                                                    <h3 class="f-w-700 text-c-orenge">
                                                        {{$total_orders_fulfilled}}
                                                    </h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-tag bg-c-orenge"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="card comp-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Paid</h6>
                                                    <h3 class="f-w-700 text-c-green">
                                                        {{$total_orders_paid}}
                                                    </h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-check bg-c-green"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card comp-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Cancelled</h6>
                                                    <h3 class="f-w-700 text-c-red">
                                                        0
                                                    </h3>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-times bg-c-red"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>


                        </li>


                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('mainjs_script')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
@endsection