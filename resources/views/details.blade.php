@extends('layouts.front')

@section('content')
<div class="cards">
	<div class="row row-sm mb-4">
		<div class="col-md-6">
			<div class="preview-pic tab-content">
				<div class="tab-pane active" id="pic-1"><img src="{{asset($products->images)}}"></div>
			</div>
		</div>
		<div class="col-md-6">
			<h3 class="product-title">{{$products->name}}</h3>
			<div class="rating">
				<div class="stars">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
				</div>
				<span class="review-no">{{$products->category->name}}</span>
			</div>
			<p class="product-description">{{$products->description}}</p>
			<h4 class="price">Stock: <span>{{$products->stock}}</span></h4>
			
			<h5 class="sizes">sizes:
				<span class="size" data-toggle="tooltip" title="small">s</span>
				<span class="size" data-toggle="tooltip" title="medium">m</span>
				<span class="size" data-toggle="tooltip" title="large">l</span>
				<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
			</h5>
			<h5 class="colors">colors:
				<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
				<span class="color green"></span>
				<span class="color blue"></span>
			</h5>
			<div class="action">
				<a class="btn btn-primary btn-rounded btn-block" href="{{url('/')}}"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
	</div>
</div>

<h2>RELATED PRODUCTS</h2>
<div class="wrapper2 wrapper-content2 animated fadeInRight">
	<div class="row">
		@foreach($relateds as $item)
		<div class="col-lg-3">
			<div class="ibox2">
				<div class="ibox-content2">
						<div class="col-sm-4">
							<div class="text-center">
								<img alt="image" height="65px" width="80px" class="m-t-xs" src="{{asset($item->images)}}">
							</div>
						</div>
						<div class="col-sm-8">
						<a href="{{route('main.detail', $item->slug)}}">
							<h3><strong>{{ $item->name }}</strong></h3>
							</a>
							<p><i class="fa fa-map-marker"></i> Tersedia ( {{$item->stock}} )</p>
							<address>
								<strong>Brands : {{ $item->brand->name }}</strong>
							</address>
						</div>
						<div class="clearfix"></div>
				</div>
			</div>
		</div> 
		@endforeach
	</div>
</div>
@endsection
@push('styles')
<style type="text/css">
img {
max-width: 100%; }

.preview {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-webkit-flex-direction: column;
-ms-flex-direction: column;
flex-direction: column; }
@media screen and (max-width: 996px) {
.preview {
margin-bottom: 20px; } }

.preview-pic {
-webkit-box-flex: 1;
-webkit-flex-grow: 1;
-ms-flex-positive: 1;
flex-grow: 1; }

.preview-thumbnail.nav-tabs {
border: none;
margin-top: 15px; }
.preview-thumbnail.nav-tabs li {
width: 18%;
margin-right: 2.5%; }
.preview-thumbnail.nav-tabs li img {
max-width: 100%;
display: block; }
.preview-thumbnail.nav-tabs li a {
padding: 0;
margin: 0; }
.preview-thumbnail.nav-tabs li:last-of-type {
margin-right: 0; }

.tab-content {
overflow: hidden; }
.tab-content img {
width: 1000px;
-webkit-animation-name: opacity;
animation-name: opacity;
-webkit-animation-duration: .3s;
animation-duration: .3s; }

.card {
margin-top: 50px;
background: #eee;
padding: 3em;
line-height: 1.5em; }

@media screen and (min-width: 997px) {
.wrapper {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex; } }

.details {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-webkit-flex-direction: column;
-ms-flex-direction: column;
flex-direction: column; }

.colors {
-webkit-box-flex: 1;
-webkit-flex-grow: 1;
-ms-flex-positive: 1;
flex-grow: 1; }

.product-title, .price, .sizes, .colors {
text-transform: UPPERCASE;
font-weight: bold; }

.checked, .price span {
color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
margin-bottom: 15px; }

.product-title {
margin-top: 0; }

.size {
margin-right: 10px; }
.size:first-of-type {
margin-left: 40px; }

.color {
display: inline-block;
vertical-align: middle;
margin-right: 10px;
height: 2em;
width: 2em;
border-radius: 2px; }
.color:first-of-type {
margin-left: 20px; }

.add-to-cart, .like {
background: #ff9f1a;
padding: 1.2em 1.5em;
border: none;
text-transform: UPPERCASE;
font-weight: bold;
color: #fff;
-webkit-transition: background .3s ease;
transition: background .3s ease; }
.add-to-cart:hover, .like:hover {
background: #b36800;
color: #fff; }

.not-available {
text-align: center;
line-height: 2em; }
.not-available:before {
font-family: fontawesome;
content: "\f00d";
color: #fff; }

.orange {
background: #ff9f1a; }

.green {
background: #85ad00; }

.blue {
background: #0076ad; }

.tooltip-inner {
padding: 1.3em; }

@-webkit-keyframes opacity {
0% {
opacity: 0;
-webkit-transform: scale(3);
transform: scale(3); }
100% {
opacity: 1;
-webkit-transform: scale(1);
transform: scale(1); } }

@keyframes opacity {
0% {
opacity: 0;
-webkit-transform: scale(3);
transform: scale(3); }
100% {
opacity: 1;
-webkit-transform: scale(1);
transform: scale(1); } }
</style>
@endpush