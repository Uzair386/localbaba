@extends('work.layouts.app')
@section('content')

@include('work.layouts.includes.datatables')

<div class="card">
    <div class="card-header">
        <h1>Products</h1>
    </div>
    <div class="icon-and-text-button-demo d-flex justify-content-center align-items-center">
        <a href="{{ route('work.product.create') }}">
            <button type="button" class="btn btn-primary waves-effect">
                <i class="fa fa-plus-circle"></i>
                <span>Add Product</span>
            </button>
        </a>
        <a href="{{ route('work.product.delete_all') }}"
        onclick="return confirm('Do you want to delete all products?');">
        <button type="button" class="btn btn-danger waves-effect">
            <i class="fa fa-trash"></i>
            <span>Delete All</span>
        </button>
    </a>
        <a href="">
            <button type="button" class="btn btn-warning waves-effect">
                <i class="fa fa-refresh"></i><span>{{ __('messages.Refresh') }}</span>
            </button>
        </a>
        <a href="{{ route('work.product.csv_export') }}">
            <button type="button" class="btn btn-primary waves-effect">
                <i class="fa fa-cloud-download"></i>
                <span>Export</span>
            </button>
        </a>
    </div>
    <br>

    


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="card"><br />
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start">
                        <select class="form-control filter-status" id="status-filter" style="font-size: inherit">
                            <option @if(request()->get('status') == null) selected @endif data-url="{{url('/work/products')}}?order={{request()->get('order')}}&vendor={{request()->get('vendor')}}&status=">Status</option>
                            <option @if(request()->get('status') == 'active') selected @endif data-url="{{url('/work/products')}}?order={{request()->get('order')}}&status=active&vendor={{request()->get('vendor')}}">Active</option>
                            <option @if(request()->get('status') == 'draft') selected @endif data-url="{{url('/work/products')}}?order={{request()->get('order')}}&status=draft&vendor={{request()->get('vendor')}}">Draft</option>
                        </select>
                        <select class="ml-2 form-control filter-status" id="status-filter" style="font-size: inherit">
                            <option @if(request()->get('vendor') == null) selected @endif data-url="{{url('/work/products')}}?order={{request()->get('order')}}&status={{request()->get('status')}}&vendor=">Vendor</option>
                            @foreach($suppliers as $supplier)
                                <option @if(request()->get('vendor') == $supplier->id) selected @endif data-url="{{url('/work/products')}}?order={{request()->get('order')}}&status={{request()->get('status')}}&vendor={{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <form class="example" action="" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Search.." name="query">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div>
                        <select class="form-control cart66-select" id="sel1"  name="product_id" style="font-size: inherit">
                            <option @if(request()->get('order') == null) selected @endif data-url="{{url('/work/products')}}&status={{request()->get('status')}}&vendor={{request()->get('vendor')}}">Sort by</option>
                            <option @if(request()->get('order') == 'name') selected @endif data-url="{{url('/work/products')}}?order=name&status={{request()->get('status')}}&vendor={{request()->get('vendor')}}">Product Title</option>
                            <option @if(request()->get('order') == 'stock_h') selected @endif data-url="{{url('/work/products')}}?order=stock_h&status={{request()->get('status')}}&vendor={{request()->get('vendor')}}">Highest Inventory</option>
                            <option @if(request()->get('order') == 'stock_l') selected @endif data-url="{{url('/work/products')}}?order=stock_l&status={{request()->get('status')}}&vendor={{request()->get('vendor')}}">Lowest Inventory</option>
                            <option @if(request()->get('order') == 'price_h') selected @endif data-url="{{url('/work/products')}}?order=price_h&status={{request()->get('status')}}&vendor={{request()->get('vendor')}}">Highest Price</option>
                            <option @if(request()->get('order') == 'price_l') selected @endif data-url="{{url('/work/products')}}?order=price_l&status={{request()->get('status')}}&vendor={{request()->get('vendor')}}">Lowest Price</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="col-md-9">
                        <h6 class="result"><b>Query:</b> {{$query}}</h6>
                    </div>
                    <div class="col-md-3">
                        <h6 class="result"><b>Total</b> {{$products->total()}} Showing {{$products->count()}} results
                        </h6>
                    </div>
                </div>

                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Vendor</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Cart+</th>
                                <th>Stock</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <?php
                                   $product_image_type= substr( $product->image, 0, 4 ) === "http";
                                   $product_image     = $product_image_type==1 ? $product->image : asset($product->image);
                                   $product_name      = $product->name;
                                   $product_name      = strlen($product_name) > 30 ? substr($product_name,0,30)."..." : $product_name;
                                   $product_page_link = url('/').'/'.$product->slug.'-'.$product->id;
                                   $delete_confirmation          = '\'Do You Want to Delete: '.$product->name.' ? \'';
                                   $update_confirmation          = '\'Do You Want to Update Price ? \'';

                                    ?>
                            <tr>
                                <td><a href="{{$product_page_link}}" target="_blank"> {{$product_name}}</a><br>
                                    <img src="{{$product_image}}" alt="" width="100" height="50" />
                                </td>
                                <td>{!!$settings->currency->symbol!!}{{number_format($product->price,2)}}</td>
                                <td>{!!$product->supplier->name!!}</td>
                                <td><b>{!!$product->category->name!!}</b></td>
                                <td>{{$product->active == 1 ? 'Active' : 'Draft'}}</td>
                                <td>{{$product->views_count}}</td>
                                <td>{{$product->cart_count}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->created_at->toDateString()}}</td>
                                <td>
                                    <a href="{{route('work.product.update_product',$product->id)}}"
                                        class="btn btn-primary btn-xs" title="Update Price"
                                        onclick="return confirm({{$update_confirmation}});"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                    <a href="{{$product->original_url}}" target="_blank" class="btn btn-info btn-xs"
                                        title="Visit Product On Supplier's Page"><i class="fa fa-globe" aria-hidden="true"></i></a>
                                    <a href="{{route('work.product.edit',$product->id)}}" class="btn btn-warning btn-xs"
                                        title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="{{route('work.product.delete',$product->id)}}"
                                        class="btn btn-danger btn-xs" title="Delete"
                                        onclick="return confirm({{$delete_confirmation}});"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a>
                                    <a href="{{route('work.product.variants',$product->id)}}" type="button"
                                        class="btn btn-secondary"><i class="fa fa-random"
                                        aria-hidden="true"></i><span>Manage Variants</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    

                </div>

                <br>
                <div  class="text-center">
                {{$products->appends(request()->query())->links()}}
                </div>
                <br>

            </div>

            

        </div>
    </div>
</div>
<style>
    div.container {
        width: 100%;
    }
</style>




<hr />
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
</style>
<script>
    $('.cart66-select').on('change', function () {
        window.location.href = $(this).children("option:selected").data('url')
    });
    $('.filter-status').on('change', function () {
        window.location.href = $(this).children("option:selected").data('url')
    });
</script>
@endsection