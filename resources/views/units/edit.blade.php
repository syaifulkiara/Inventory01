@extends('layouts.master')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
		<a class="breadcrumb-item" href="index.html">Bracket</a>
		<a class="breadcrumb-item" href="#">Tables</a>
		<span class="breadcrumb-item active">Units</span>
	</nav>
</div>
<div class="br-pagetitle">
	<i class="icon icon ion-ios-bookmarks-outline"></i>
	<div>
		<h4>Edit Unit</h4>
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
	<div class="row">
	<div class="col-lg-4">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
				<form action="{{ route('units.update', $units->id)}}" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label class="">Name Unit</label>
						<input class="form-control" type="text" value="{{$units->name}}" name="name">
					</div>
					<div class="form-group">
						<label class="">Description</label>
						<textarea class="form-control" name="description" rows="3">{{$units->description}}</textarea>
					</div>
					<a href="{{route('units.index')}}" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update</button>
				</form>
			</div>
		</div>
	</div>	
</div>
@endsection