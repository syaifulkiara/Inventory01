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
		<h4>Edit Products</h4>
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
	<div class="br-section-wrapper">
		<form action="{{ route('products.update', $products->id)}}" method="POST">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="form-group col-md-8">
					<label>Nama Barang</label> 
					<input type="text" placeholder="input nama barang" name="name" value="{{ $products->name }}" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Kode Barang</label> ( optional )
					<input type="text" placeholder="input kode barang" name="code_product" value="{{ $products->code_product }}" class="form-control">
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
					<input type="number" class="form-control" name="stock" value="{{ $products->stock }}" id="qty">
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
				<div class="form-group col-md-8">
					<label for="">Image</label>
					<input type="file" name="images" class="form-control" id="image">
				</div>
				<div class="form-group col-md-8">
					<label>Deskripsi</label>
					<textarea class="form-control" name="description" rows="7"></textarea>
				</div>
				<div class="form-group col-md-4">
					<a href="#" class="thumbnail">
						<img id="preview-image" src="{{asset($products->images)}}" width="300px">
					</a>
				</div>
			</div>
			<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update</button>
		</div>
	</form>
</div>
@endsection
@push('scripts')
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