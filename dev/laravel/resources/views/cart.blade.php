@extends('layouts.app')
@section('title', 'Cart')
@section('description', 'Cart | '.$settings->site_name.'')
@section('content')
<!-- =========================
        Slider Section
    ============================== -->
<section class=" wd-slider-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"> <br /> </div>
          @if(count(Cart::content()) >0)
          <div class="col-md-12 col-md-3">
            <a href="{{ route('cart.empty') }}" class="btn btn-danger pull-right"
              onclick="return confirm('{{ __('messages.Do You Want to Empty Cart') }} ? ');"><i
                class="fa fa-trash-o"></i> {{ __('messages.Empty Cart') }}</a>
          </div>
          @endif
          <div class="card-body">
            <!-- <form method="POST" action="" > -->
            @csrf

            <table id="cart" class="table table-hover table-condensed">
              @if(count(Cart::content()) >0)
              <thead>
                <tr>
                  <th style="width:50%">{{ __('messages.Name') }}</th>
                  <th style="width:10%">{{ __('messages.Price') }}</th>
                  <th style="width:8%">{{ __('messages.Quantity') }}</th>
                  <th style="width:22%" class="text-center">{{ __('messages.Subtotal') }}</th>
                  <th style="width:10%"></th>
                </tr>
              </thead>
              <tbody>

                @foreach (Cart::content() as $product)
                <tr>
                  <td data-th="Product">
                    <div class="row">
                      <div class="col-sm-2 hidden-xs"><img src="{{asset($product->model->image)}}" alt="Image"
                          class="img-responsive" /></div>
                      <div class="col-sm-10">
                        <p class="nomargin"><b>{{$product->name}}</b></p>
                        <p class="nomargin">{{ __('messages.Stock') }}: <b>{{$product->model->stock}}</b></p>
                      </div>
                    </div>
                  </td>
                  <td data-th="Price">{!!$settings->currency->symbol!!}{{$product->price}}</td>

                  <form action="{{route('cart.update')}} " method="post">
                    {{csrf_field()}}
                    <td data-th="Quantity">
                      <input type="number" name="quantity" min="1" max="{{$product->model->stock}}"
                        class="form-control text-center" value="{{$product->qty}}">
                      <input type="hidden" name="id" value="{{$product->rowId}}">
                    </td>
                    <td data-th="Subtotal" class="text-center">{!!$settings->currency->symbol!!}{{$product->subtotal()}}
                    </td>
                    <td class="actions" data-th="">
                      <!-- <a href="{{route('cart.update',['id'=>$product->rowId,'qty'=>$product->rowId])}}"><button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button></a> -->
                      <button type="submit" name="submit" class="btn btn-info btn-sm"><i
                          class="fa fa-refresh"></i></button>
                  </form>
                  <a href="{{route('cart.delete',['id'=>$product->rowId])}}"
                    onclick="return confirm('Do You Want to remove this item from Cart ? ');"><button
                      class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                  </td>

                </tr>
                @endforeach


              </tbody>
              <tfoot>
                <tr class="visible-xs">
                  <!-- <td class="text-center"><strong>Total 21.99</strong></td> -->
                </tr>
                <tr>
                  <td><a href="{{ url('/products') }}" class="btn btn-warning"><i
                        class="fa fa-angle-left"></i>{{ __('messages.Continue Shopping') }}</a></td>
                  <td colspan="2" class="hidden-xs"></td>
                  <td class="hidden-xs text-center"><strong>{{ __('messages.Total') }}
                      {!!$settings->currency->symbol!!}{{Cart::subtotal()}}</strong></td>
                  <!-- <td><a href="{{ url('/checkout') }}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td> -->
                </tr>
              </tfoot>

              @else
              <center>
                <p>
                  <div class="alert alert-warning text-center">
                    <strong>{{ __('messages.Cart is  Empty') }}</strong>.
                  </div>
                </p> <a href="{{ url('/products') }}" class="btn btn-warning"><i
                    class="fa fa-angle-left mr-2"></i>{{ __('messages.Continue Shopping') }}</a>
              </center>
              @endif
            </table>


            <hr />

            @if(count(Cart::content()) >0)
            <!--Coupons-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <center>
                    <p>
                      <div class="alert alert-info text-center">
                        <strong>{{ __('messages.Coupons') }}</strong>
                      </div>
                    </p>
                  </center>

                  <table id="cart" class="table table-hover table-condensed">
                    <tbody>

                      <tr>
                        <td data-th="">
                          <div class="row">
                            <div class="col-sm-12">
                              <p class="nomargin">
                                <center><b>{{ __('messages.Have A Promotional Code') }}?</b></center>
                              </p>
                            </div>
                          </div>
                        </td>

                        <td data-th="">
                          <div class="row">
                            <div class="col-sm-10 pull-right">
                              <form action="{{route('coupon.add')}} " method="post">
                                {{csrf_field()}}
                                <div class="form-group input-group">
                                  <input type="text" required name="code" class="form-control"
                                    placeholder="{{ __('messages.Enter Coupon') }}">
                                  <span class="input-group-btn">
                                    <button class="btn btn-info"
                                      type="submit">{{ __('messages.Apply Coupon') }}</button>
                                  </span>
                                </div>
                              </form>

                            </div>
                          </div>
                        </td>

                      </tr>


                    </tbody>

                  </table>




                </div>


              </div>
            </div>
            <hr />
            <!--Coupons-->

            <!--  ***********CART TOTALS*************-->

            <div class="container-fluid">
              <div class="row">
                @if (Auth::check())
                <div class="col-sm-6">
                  <center>
                    <p>
                      <div class="alert alert-info text-center">
                        <strong>{{ __('messages.Billing Details') }}.</strong>
                      </div>
                    </p>
                  </center>
                  <div class="form-group">
                    <strong><label class="control-label" for="country_id">{{ __('messages.Country') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="country" readonly="" required="required" id="country"
                        class="form-control" title="Country" size="35" placeholder="Please Select your Country"
                        value="{{Auth::user()->country->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="address">{{ __('messages.Address') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <hr />
                    <div class="addy">
                      {!!Auth::user()->address!!}
                    </div>
                  </div>

                  <div class="form-group">
                    <strong><label class="control-label" for="mobile">{{ __('messages.Phone') }} :<span
                          class="required">*</span> </label></strong>
                    <div class="info">
                      <input type="text" name="phone_number" id="mobile" readonly="" class="form-control"
                        title="Mobile No" required="required" size="35" placeholder="Phone Number"
                        value="{{Auth::user()->phone_number}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="state">{{ __('messages.State') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="state" readonly="" required="required" id="state" class="form-control"
                        title="" size="35" placeholder="Enter State" value="{!!Auth::user()->state!!}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="city">{{ __('messages.City') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="city" readonly="" required="required" id="city" class="form-control"
                        title="" size="35" placeholder="Enter City" value="{!!Auth::user()->city!!}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="postal_code">{{ __('messages.Postal Code') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="postal_code" readonly="" required="required" id="postal_code"
                        class="form-control" title="Please Type your Postal Code" size="35"
                        placeholder="Enter Postal Code" value="{{Auth::user()->postal_code}}">
                    </div>
                  </div>

                  <center><a href="{{route('account.user.edit')}}"><button type="submit" class="btn btn-info"><i
                          class="fa fa-pencil-square-o"
                          aria-hidden="true"></i>{{ __('messages.Edit Address') }}</button></a></center>
                </div>
                @else
                <div class="col-sm-6">
                  <center>
                    <p>
                      <div class="alert alert-danger text-center">
                        <strong> {{ __('messages.You Have to Be Logged! In To Continue') }}.</strong>
                      </div>
                    </p>
                  </center>
                  <div id="shipping-calculator">
                    <fieldset>
                      <br />
                      <a href="{{ url('/register') }}" class="pull-left btn btn-primary"><i
                          class="fa fa-chevron-left"></i>{{ __('messages.Register') }}</a>
                      <a href="{{ url('/login') }}" class="pull-right btn btn-primary"><i
                          class="fa fa-chevron-right"></i>{{ __('messages.login') }}</a>
                    </fieldset>
                    <!-- end billing details  -->
                  </div>
                </div>
                <hr />
                @endif

                <div class="col-sm-6">

                  <p>
                    <div class="alert alert-info">
                      <strong>{{ __('messages.Delivery Information') }}</strong>
                      <p>
                        {!!$settings->delivery_terms !!}
                      </p>
                    </div>
                  </p>
                  <p>
                    <div class="alert alert-info text-center">
                      <strong>{{ __('messages.Cart Totals') }}</strong>
                    </div>
                  </p>

                  <table class="table table-bordered" cellspacing="0">
                    <tr class="cart-subtotal">
                      <th>{{ __('messages.products') }}:</th>
                      <td><span class="amount">{{Cart::content()->count()}}</span></td>
                    </tr>
                    <tr class="cart-subtotal">
                      <th>{{ __('messages.Items') }}:</th>
                      <td><span class="amount">{{Cart::count()}}</span></td>
                    </tr>
                    

                    @if (Cart::discount() > 0)
                    <tr class="cart-subtotal">
                      <th>{{ __('messages.Initial Order') }}:</th>
                      <td><span
                          class="amount">{!!$settings->currency->symbol!!}<strike>{{Cart::priceTotal()}}</strike></span>
                      </td>
                    </tr>

                    <tr class="cart-subtotal">
                      <th>
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        @if (Session::exists('coupon_code'))
                        {{Session::get('coupon_code')}}
                        @else
                        {{ __('messages.Discount') }}
                        @endif
                        (- 
                        @if (Session::exists('coupon_percentage_off'))
                        {{Session::get('coupon_percentage_off')}}
                        @endif
                        %):
                      </th>
                      <td><span class="amount">{!!$settings->currency->symbol!!}{{Cart::discount()}} </span>
                        <a href="{{route('coupon.delete')}}"
                          onclick="return confirm('Do you want to remove this Coupon? ');"><button
                            class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </a>
                      </td>
                    </tr>
                    @endif

                    
                    <tr class="order-total">
                      <th>{{ __('messages.Order') }} </th>
                      <td><strong><span class="amount">{!!$settings->currency->symbol!!}{{Cart::subtotal()}}
                          </span></strong>
                      </td>
                    </tr>
                    <tr class="cart-subtotal">
                      <th>{{ __('messages.Tax') }}(+{{$settings->tax}}%):</th>
                      <td><span class="amount">{!!$settings->currency->symbol!!}{{Cart::tax()}}</span></td>
                    </tr>



                    <tr class="order-total">
                      <th>{{ __('messages.Order Total') }}</th>
                      <td><strong><span class="amount">{!!$settings->currency->symbol!!}{{Cart::total()}}
                          </span></strong>
                      </td>
                    </tr>

                    </tbody>
                  </table>
                  @if (Auth::check())
                  <div class="alert alert-info text-center">
                    <strong>{{ __('messages.Info') }}!</strong>
                    {{ __('messages.Please verify that Billing information is correct') }}.
                  </div>
                  <center><a href="{{route('cart.checkout')}}"><button type="submit" class="btn btn-success"
                        name="submit"><i class="fa fa-chevron-right"></i>{{ __('messages.Checkout') }}</button></a>
                  </center>
                  @endif
                </div>

                @endif


              </div>
            </div>


            <!--Expand-->



            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>




















  <style>
    @media screen and (max-width: 800px) {
      table#cart tbody td .form-control {
        width: 20%;
        display: inline !important;
      }

      .actions .btn {
        width: 36%;
        margin: 1.5em 0;
      }

      .actions .btn-info {
        float: left;
      }

      .actions .btn-danger {
        float: right;
      }

      table#cart thead {
        display: none;
      }

      table#cart tbody td {
        display: block;
        padding: .6rem;
        min-width: 240px;
      }

      table#cart tbody tr td:first-child {
        background: #333;
        color: #fff;
      }

      table#cart tbody td:before {
        content: attr(data-th);
        font-weight: bold;
        display: inline-block;
        width: 6rem;
      }



      table#cart tfoot td {
        display: block;
      }

      table#cart tfoot td .btn {
        display: block;
      }

    }
  </style>

  <!--container end.//-->
</section>
@endsection