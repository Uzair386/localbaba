@extends('layouts.app')
@section('title', 'Checkout')
@section('description', 'Checkout | '.$settings->site_name.'')
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
          <h5 class="text-center">{{ __('messages.Your Order') }}</h5>
          <div class="card-body">
            <!-- <form method="POST" action="" > -->
            @csrf

            <table id="cart" class="table table-hover table-condensed">

              @if(count(Cart::content()) > 0)
              <thead>
                <tr>
                  <th style="width:50%">{{ __('messages.Name') }}</th>
                  <th style="width:10%">{{ __('messages.Price') }}</th>
                  <th style="width:8%">{{ __('messages.Quantity') }}</th>
                  <th style="width:22%" class="text-center">{{ __('messages.Subtotal') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php @$total_supplier_price = 0 ?>
                @foreach (Cart::content() as $product)
                <?php
                                      $correct_supplier_price = $product->model->supplier_price*$product->qty;
                                      $total_supplier_price += $correct_supplier_price ?>
                <tr>
                  <td data-th="Product">
                    <div class="row">
                      <div class="col-sm-2 hidden-xs"><img src="{{asset($product->model->image)}}" alt="Image"
                          class="img-responsive" /></div>
                      <div class="col-sm-10">
                        <p class="nomargin"><b>{{$product->name}}</b></p>
                      </div>
                    </div>
                  </td>
                  <td data-th="Price">{!!$settings->currency->symbol!!}{{$product->price}}</td>

                  <form action="{{route('cart.update')}} " method="post">
                    {{csrf_field()}}
                    <td data-th="Quantity">
                      <input type="number" readonly name="quantity" min="1" max="{{$product->model->stock}}"
                        class="form-control text-center" value="{{$product->qty}}">
                      <input type="hidden" name="id" value="{{$product->rowId}}">
                    </td>
                    <td data-th="Subtotal" class="text-center">{!!$settings->currency->symbol!!}{{$product->subtotal()}}
                    </td>
                    <td class="actions" data-th="">
                  </form>
                  </td>

                </tr>
                @endforeach


              </tbody>
              <tfoot>
                <tr class="visible-xs">
                </tr>
                <tr>
                  <td><a href="{{ url('/cart') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                      {{ __('messages.Return to Cart') }}<i class="fa fa-cart-plus"> </a></td>
                  <td colspan="2" class="hidden-xs"></td>
                  <td class="hidden-xs text-center"><strong>{{ __('messages.Total') }} {!!$settings->currency->symbol!!}
                      {{Cart::subtotal()}}</strong></td>
                  <!-- <td><a href="{{ url('/checkout') }}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td> -->
                </tr>
              </tfoot>

              @else
              <center>
                <p>
                  <div class="alert alert-warning text-center">
                    <strong>{{ __('messages.Cart is  Empty') }}</strong>.
                  </div>
                </p> <a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                  {{ __('messages.Continue Shopping') }}</a>
              </center>
              @endif
            </table>


            <hr />


            <!--Expand-->


            <!--  ***********CART TOTALS*************-->
            @if(count(Cart::content()) >0)
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
                    <strong><label class="control-label" for="name">{{ __('messages.Name') }} :<span
                                class="required">*</span> </label></strong>
                    <div class="info">
                      <input type="text" name="name" id="name" readonly="" class="form-control"
                             title="Customer Name" required="required" size="35" placeholder="Customer Name"
                             value="{{\Illuminate\Support\Facades\Session::get('customer_details')['name']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="email">{{ __('messages.Email') }} :<span
                                class="required">*</span> </label></strong>
                    <div class="info">
                      <input type="text" name="email" id="email" readonly="" class="form-control"
                             title="Email Address" required="required" size="35" placeholder="Email Address"
                             value="{{\Illuminate\Support\Facades\Session::get('customer_details')['email']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="mobile">{{ __('messages.Phone') }} :<span
                                class="required">*</span> </label></strong>
                    <div class="info">
                      <input type="text" name="phone_number" id="mobile" readonly="" class="form-control"
                             title="Mobile No" required="required" size="35" placeholder="Phone Number"
                             value="{{\Illuminate\Support\Facades\Session::get('customer_details')['phone_number']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="country_id">{{ __('messages.Country') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="country" readonly="" required="required" id="country"
                        class="form-control" title="Country" size="35" placeholder="Please Select your Country"
                        value="{{\Illuminate\Support\Facades\Session::get('customer_details')['country']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="address">{{ __('messages.Address') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="addy mb-4">
                      {!!\Illuminate\Support\Facades\Session::get('customer_details')['address']!!}
                    </div>
                  </div>


                  <div class="form-group">
                    <strong><label class="control-label" for="state">{{ __('messages.State') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="state" readonly="" required="required" id="state" class="form-control"
                        title="" size="35" placeholder="Enter State" value="{{\Illuminate\Support\Facades\Session::get('customer_details')['state']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="city">{{ __('messages.City') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="city" readonly="" required="required" id="city" class="form-control"
                        title="" size="35" placeholder="Enter City" value="{{\Illuminate\Support\Facades\Session::get('customer_details')['city']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <strong><label class="control-label" for="postal_code">{{ __('messages.Postal Code') }} :<span
                          class="required">*</span></strong>
                    </label>
                    <div class="info">
                      <input type="text" name="postal_code" readonly="" required="required" id="postal_code"
                        class="form-control" title="Please Type your Postal Code" size="35"
                        placeholder="Enter Postal Code" value="{{\Illuminate\Support\Facades\Session::get('customer_details')['postal_code']}}">
                    </div>
                  </div>

                  <center><a href="{{route('cart')}}"><button type="submit" class="btn btn-info"><i
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
                    <fieldset class="d-flex justify-content-center my-4">
                      <a href="javascript:void(0)" class="text-center btn btn-primary register-btn mr-2">
                        {{ __('messages.Register') }}</a>
                      <a href="javascript:void(0)" class="text-center btn btn-primary login-btn d-none">
                        {{ __('messages.login') }}
                      </a>
                    </fieldset>
                    <form id="login-cart" method="POST" action="{{ route('login') }}" aria-label="{{ __('messages.login') }}">
                      @csrf

                      @if (count($errors)>0)
                        <ul class="list-group">
                          @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                              {{$error}}
                            </li>
                          @endforeach

                        </ul> <br />
                      @endif

                      <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                        <div class="col-md-6">
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                          @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                        <div class="col-md-6">
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                          @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                          {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                          @if ($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                   </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}
                              <input type="hidden" name="cart" value="true">
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('messages.login') }}
                          </button>

                          <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                            {{ __('messages.Forgot Your Password?') }}
                          </a>
                        </div>
                      </div>
                    </form>
                    <form class="d-none" id="register-cart" method="POST" action="{{ route('register') }}" aria-label="{{ __('messages.Register') }}">
                      @csrf
                      @if (count($errors)>0)
                        <ul class="list-group">
                          @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                              {{$error}}
                            </li>
                          @endforeach

                        </ul> <br />
                      @endif
                      <input type="hidden" name="cart" value="true">
                      <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('messages.Select Country') }}</label>
                        <div class="col-md-6">
                          <select id="country_id" name="country_id" class="form-control" value="{{ old('country_id') }}" required autofocus>
                            @foreach($countries as $country)
                              <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Username') }}</label>
                        <div class="col-md-6">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required >
                          @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="contact_name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Full Name') }}</label>
                        <div class="col-md-6">
                          <input id="contact_name" type="text" class="form-control" name="contact_name"  required >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                        <div class="col-md-6">
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                          @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                        <div class="col-md-6">
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                          @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirm Password') }}</label>

                        <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-6">
                          {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                          @if ($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                   </span>
                          @endif
                        </div>
                      </div>



                      <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('messages.Register') }}
                          </button>
                        </div>
                      </div><hr />
                      <div class="wd-policy">
                        <p>
                          {{ __('messages.By_Continuing_registration') }} <a href="{{route('single_page', ['slug'=>'tos'])}}">{{ __('messages.terms of uses') }}</a> {{ __('messages.and') }} <a href="{{route('single_page', ['slug'=>'policy-privacy'])}}">{{ __('messages.Privacy Policy') }}</a>.
                        </p>
                      </div>
                    </form>
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
                      </td>
                    </tr>
                    @endif

                    <tr class="order-total">
                      <th>{{ __('messages.Order') }}</th>
                      <td><strong><span class="amount">{!!$settings->currency->symbol!!}{{Cart::subtotal()}}
                          </span></strong>
                      </td>
                    </tr>
                    <tr class="cart-subtotal">
                      <th>{{ __('messages.Tax') }} ({{$settings->tax}}%):</th>
                      <td><span class="amount">{!!$settings->currency->symbol!!}{{Cart::tax()}}</span></td>
                    </tr>
                    <!-- <h5> Adds Vat</h5> -->
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
                  @endif





                </div>

                @endif


              </div>
            </div>


            <!--Expand-->



            <!-- </form> -->
          </div>
          <hr />




          @if(empty(Auth::user()->country->name) || empty(Auth::user()->address) || empty(Auth::user()->phone_number) ||
          empty(Auth::user()->state)|| empty(Auth::user()->city) || empty(Auth::user()->postal_code) )
          <div class="alert alert-warning text-center">
            <strong>{{ __('messages.Empty Field') }}</strong>{{ __('messages.One or more elements from your shipping address is empty') }}

          </div>

          @else
          <div class="row">
            @if($gateway->stripe_active == 1)
            <?php $cart_total = Cart::total();
                      $cart_total = str_replace(',', '', $cart_total);
                       ?>
            <div class="col-xs-12 col-md-4 col-lg-4 pull-left">
              <div class="text-center">
                <form action="{{route('account.gateway.stripe')}}" method="POST">
                  {{csrf_field()}}
                  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{$gateway->stripe_publishable_key}}" data-amount="{{$cart_total * 100}}"
                    data-name="{{$settings->site_name}}" data-description="Product Payment"
                    data-email="{{Auth::user()->email}}" data-currency="{{$settings->currency->code}}"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto">
                  </script>


                  <script>
                    // Hide default stripe button, be careful there if you
                              // have more than 1 button of that class
                              document.getElementsByClassName("stripe-button-el")[0].style.display = "none";
                  </script>
                  <button title="Pay with Stripe" type="submit" class="btn btn-primary"><i class="fa fa-cc-stripe"
                      aria-hidden="true"></i> Stripe</button>
                  <input type="hidden" name="price" value="{{Cart::total()}}">
                  <input type="hidden" name="total_supplier_price" value="{{$total_supplier_price}}">
                  <input type="hidden" name="pro_id"
                    value="@foreach (Cart::content() as $product){{$product->model->stock}},@endforeach">
                  {{-- temp --}}
                  <input type="hidden" name="initial_amount" value="{{Cart::priceTotal()}}">
                  <input type="hidden" name="coupon_id"
                    value="{{(Session::exists('coupon_id'))? Session::get('coupon_id'):0}}">
                  <input type="hidden" name="coupon_code"
                    value="{{(Session::exists('coupon_code'))? Session::get('coupon_code') :0}}">
                  <input type="hidden" name="coupon_percentage_off"
                    value="{{(Session::exists('coupon_percentage_off'))? Session::get('coupon_percentage_off'):0}}">
                  {{-- temp --}}
                </form>
              </div>
            </div>
            @endif

            @if($gateway->paypal_active == 1)
            <!-- paypal -->
            <div class="col-xs-12 col-md-4 col-lg-4">
              <div class="text-center">
                <form action="{{route('account.gateway.paypal')}}" method="post" name="frmPayPal1">
                  {{csrf_field()}}
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="item_name" value="Product Payment">
                  {{-- temp --}}
                  <input type="hidden" name="initial_amount" value="{{Cart::priceTotal()}}">
                  <input type="hidden" name="coupon_id"
                    value="{{(Session::exists('coupon_id'))? Session::get('coupon_id'):0}}">
                  <input type="hidden" name="coupon_code"
                    value="{{(Session::exists('coupon_code'))? Session::get('coupon_code') :0}}">
                  <input type="hidden" name="coupon_percentage_off"
                    value="{{(Session::exists('coupon_percentage_off'))? Session::get('coupon_percentage_off'):0}}">
                  {{-- temp --}}
                  <!--inv name -->
                  <input type="hidden" name="item_number" value="{{$total_supplier_price}}">
                  <input type="hidden" name="amount" value="{{$cart_total}}">
                  <input type="hidden" name="no_shipping" value="0">
                  <input type="hidden" name="currency_code" value="{{$settings->currency->code}}">
                  <input type="hidden" name="handling" value="0">
                  <input type="hidden" name="cancel_return" value="">
                  <input title="Pay with PayPal" type="hidden" name="return" value=""><button type="submit"
                    class="btn btn-info" onclick="return confirm('{{ __('messages.Pay Via') }} PayPal ?');"><i
                      class="fa fa-paypal" aria-hidden="true"></i> PayPal</button>
                  <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1"
                    height="1">
                </form>
              </div>
            </div>
            @endif
            @if($gateway->voguepay_active == 1)
            <!-- VoguePay -->
            <div class="col-xs-12 col-md-4 col-lg-4 pull-right">
              <div class="text-center">
                <form action="https://voguepay.com/pay/" method="post">
                  <input type="hidden" name="total" readonly value="{{$cart_total}}" />
                  <input type="hidden" name="store_id" value="{{Cart::count()}}" />
                  <input type="hidden" name="v_merchant_id" value="{{$gateway->voguepay_merchant_id}}" />
                  <input type="hidden" name="memo" value="Product Payment" />
                  <input type="hidden" name="developer_code" value="5a87c27f2d48a" />
                  <input type="hidden" name="cur" value="{{$settings->currency->code}}" />
                  <input type="hidden" name="merchant_ref" value="{{$total_supplier_price}}" />
                  <input type="hidden" name="success_url" value="{{route('account.gateway.voguepay_success')}}" />
                  <input type="hidden" name="fail_url" value="{{route('account.gateway.voguepay_fail')}}" />
                  {{-- temp --}}
                  <input type="hidden" name="initial_amount" value="{{Cart::priceTotal()}}">
                  <input type="hidden" name="coupon_id"
                    value="{{(Session::exists('coupon_id'))? Session::get('coupon_id'):0}}">
                  <input type="hidden" name="coupon_code"
                    value="{{(Session::exists('coupon_code'))? Session::get('coupon_code') :0}}">
                  <input type="hidden" name="coupon_percentage_off"
                    value="{{(Session::exists('coupon_percentage_off'))? Session::get('coupon_percentage_off'):0}}">
                  {{-- temp --}}
                  <button title="Pay with VoguePay" type="submit" name="submit" class="btn btn-primary"
                    onclick="return confirm('{{ __('messages.Pay Via') }} VoguePay ?');"><i class="fa fa-check"></i>
                    VoguePay</button>
                </form>
              </div>
            </div>
            @endif
                <?php $cart_total = Cart::total();
                $cart_total = str_replace(',', '', $cart_total);
                ?>
                <div class="col-xs-12 col-md-4 col-lg-4 pull-left">
                  <div class="text-center">
                    <form action="{{route('account.gateway.cod')}}" method="POST">
                      {{csrf_field()}}
                      <button title="Cash On Delivery" type="submit" class="btn btn-primary">Cash On Delivery</button>
                      <input type="hidden" name="price" value="{{Cart::total()}}">
                      <input type="hidden" name="total_supplier_price" value="{{$total_supplier_price}}">
                      <input type="hidden" name="pro_id"
                             value="@foreach (Cart::content() as $product){{$product->model->stock}},@endforeach">
                      {{-- temp --}}
                      <input type="hidden" name="initial_amount" value="{{Cart::priceTotal()}}">
                      <input type="hidden" name="coupon_id"
                             value="{{(Session::exists('coupon_id'))? Session::get('coupon_id'):0}}">
                      <input type="hidden" name="coupon_code"
                             value="{{(Session::exists('coupon_code'))? Session::get('coupon_code') :0}}">
                      <input type="hidden" name="coupon_percentage_off"
                             value="{{(Session::exists('coupon_percentage_off'))? Session::get('coupon_percentage_off'):0}}">
                      {{-- temp --}}
                    </form>
                  </div>
                </div>
          </div>
          <hr />
          @endif





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