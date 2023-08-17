@extends('layouts.master')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
		<a class="breadcrumb-item" href="index.html">Bracket</a>
		<a class="breadcrumb-item" href="#">Tables</a>
		<span class="breadcrumb-item active">Products</span>
	</nav>
</div>
<div class="br-pagetitle">
	<i class="icon icon ion-ios-bookmarks-outline"></i>
	<div>
		<h4>Products</h4>
		<p class="mg-b-0">DataTables is a plug-in for the jQuery Javascript library.</p>
	</div>
</div>

<div class="br-pagebody">
	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissable" role="alert">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		{{ Session('success')}}
	</div>
	@endif
	@if(count($errors)>0)
	@foreach($errors->all() as $error)
	<div class="alert alert-danger alert-dismissable" role="alert">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		{{ $error}}
	</div>
	@endforeach
	@endif
	<div class="card pd-30 shadow-base bd-0 mg-t-20 mb-2">
      <div class="d-lg-flex justify-content-lg-between align-items-lg-center">
        <div class="mg-b-20 mg-lg-b-0">
          <h4 class="tx-normal tx-roboto tx-inverse mg-b-5">Get Ready For School - Up to 35% Coupon</h4>
          <p class="tx-13 mg-b-0">Use code BRKTCOUPON on select items only. Find an item with a sign BRCKT. <a href="" class="tx-primary">More Details</a></p>
        </div>
        <a href="" class="btn btn-success btn-oblong pd-x-25 tx-11 tx-uppercase pd-y-12 tx-mont tx-semibold" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus mg-l-10"></i>  Add New Product</a>
      </div><!-- row -->
    </div>

	<div class="row">
		<div class="col-md-12">
			<div class="card bd-0">
				<div class="card-header tx-medium bd-0 tx-white bg-transfile">
					List Products
				</div>
				<div class="card-body bd bd-t-0 rounded-bottom">
					<div class="table-wrapper">
						<table id="datatable1" class="table display responsive nowrap">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th>Gambar</th>
									<th>Name</th>
									<th>Kategori</th>    
									<th>Merek</th>                      
									<th>Stok</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $item)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td><img src="{{asset($item->images)}}" width="60px"></td>
									<td><a href="{{route('products.show',$item->id)}}">{{$item->name}}</a></td>
									<td>{{$item->category->name}}</td>
									<td>{{$item->brand->name}}</td>
									<td>{{$item->stock}}</td>
									<td>{{$item->description}}</td>
									<td>
										<form action="{{route('products.destroy',$item->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<a href="{{route('products.edit', $item->id)}}" class="btn btn-warning btn-xs btn-outline">Edit</a>
											<button class="btn btn-danger btn-xs btn-outline" type="submit" onclick="return confirm('Yakin Mau Dihapus Merek {{$item->name}}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">Delete</button>
										</form> 
									</td>
								</tr>
								@endforeach
							</tbody>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content tx-size-sm">
			<div class="modal-header pd-x-20">
				<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Data Barang</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pd-20">
				<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="form-group col-md-8">
							<label>Nama Barang</label> 
							<input type="text" placeholder="input nama barang" name="name" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label>Kode Barang</label> ( optional )
							<input type="text" placeholder="input kode barang" name="code_barang" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="inputCity">Pilih Kategori</label>
							<select id="inputState" name="category_id" class="form-control">
								@foreach($categories as $rows)
								<option value="{{$rows->id}}">{{$rows->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-4">
							<label for="inputState">Pilih Merek/Brand</label>
							<select id="inputState" name="brand_id" class="form-control">
								@foreach($brands as $rows)
								<option value="{{$rows->id}}">{{$rows->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-2">
							<label for="qty">Qty</label>
							<input type="number" class="form-control" name="stock" id="qty">
						</div>
						<div class="form-group col-md-2">
							<label for="">Pilih Satuan</label>
							<select id="inputState" name="unit_id" class="form-control">
								@foreach($units as $rows)
								<option value="{{$rows->id}}">{{$rows->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-7">
							<label for="">Image</label>
							<input type="file" name="images" class="form-control" id="image" accept="image/*;capture=camera">
						</div>
						<div class="form-group col-md-5">
							<a href="#" class="thumbnail">
								<img id="preview-image" src="{{asset('images/products/300.png')}}">
							</a>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary tx-size-xs">Save changes</button>
					<button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
@push('styles')
<link href="{{ asset('assets/lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<style type="text/css" media="screen">
.thumbnail {
  display: block;
  padding: @thumbnail-padding;
  margin-bottom: @line-height-computed;
  line-height: @line-height-base;
  background-color: @thumbnail-bg;
  border: 1px solid @thumbnail-border;
  border-radius: @thumbnail-border-radius;
  
}
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
<script>
$(function(){
	'use strict';

	$('#datatable1').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		}
	});
});
</script>
<script>      
$(document).ready(function (e) {  
$('#image').change(function(){           
let reader = new FileReader();
reader.onload = (e) => { 
  $('#preview-image').attr('src', e.target.result); 
}
reader.readAsDataURL(this.files[0]);   
});  
});
</script>
@endpush
