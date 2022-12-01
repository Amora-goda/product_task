@extends('layouts.master')
@section('title')
    Products
@stop
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Products</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ $product->image_url}}" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="assets/images/product-details/01.jpg" class="img" alt="#">
                                    <img src="assets/images/product-details/02.jpg" class="img" alt="#">
                                    <img src="assets/images/product-details/03.jpg" class="img" alt="#">
                                    <img src="assets/images/product-details/04.jpg" class="img" alt="#">
                                    <img src="assets/images/product-details/05.jpg" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name}}</h2>
                            <p class="category"><i class="lni lni-tag"></i> Drones:<a href="javascript:void(0)">{{ $product->category->name}}</a></p>
                            <h3 class="price">{{$product->price}}
                               @if($product->compare_price)
                            <span>{{Currency::format($product->compare_price)}}</span>
                               @endif
                        </h3>
                            <p class="info-text">{{ $product->description}}</p>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group color-option">
                                        <label class="title-label" for="size">Choose color</label>
                                        <div class="single-checkbox checkbox-style-1">
                                            <input type="checkbox" id="checkbox-1" checked>
                                            <label for="checkbox-1"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-2">
                                            <input type="checkbox" id="checkbox-2">
                                            <label for="checkbox-2"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-4">
                                            <input type="checkbox" id="checkbox-4">
                                            <label for="checkbox-4"><span></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="color">Battery capacity</label>
                                        <select class="form-control" id="color">
                                            <option>5100 mAh</option>
                                            <option>6200 mAh</option>
                                            <option>8000 mAh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button class="btn" style="width: 100%;">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-reload"></i> Compare</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection


@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
