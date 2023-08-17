@extends('layouts.master')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
		<a class="breadcrumb-item" href="index.html">Bracket</a>
		<a class="breadcrumb-item" href="#">Tables</a>
		<span class="breadcrumb-item active">Brands</span>
	</nav>
</div>
<div class="br-pagetitle">
	<i class="icon icon ion-ios-bookmarks-outline"></i>
	<div>
		<h4>Brands</h4>
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
		<div class="col-md-4">
			<div class="card bd-0">
				<div class="card-header tx-medium bd-0 tx-white bg-mantle">
					Input New Brands
				</div>
				<div class="card-body bd bd-t-0 rounded-bottom">
					<form action="{{ route('brands.store')}}" method="POST">
						@csrf
						<div class="form-group">
							<label class="form-control-label">Name Brands: <span class="tx-danger">*</span></label>
							<input class="form-control"name="name" type="text">
						</div>
						<div class="form-group">
							<label class="form-control-label">Description: </label>
							<textarea rows="3"name="description" class="form-control"></textarea>
						</div>
						<div class="form-layout-footer">
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card bd-0">
				<div class="card-header tx-medium bd-0 tx-white bg-transfile">
					List Brands
				</div>
				<div class="card-body bd bd-t-0 rounded-bottom">
					<div class="table-wrapper">
						<table id="datatable1" class="table display responsive nowrap">
							<thead>
								<tr>
									<th>Brand</th>
									<th>Description</th>
									<th>Create</th>
									<th style="min-width: 100px">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($brands as $rows)
								<tr>
									<td>{{$rows->name}}</td>
									<td>{{$rows->description}}</td>
									<td>{{ Carbon\Carbon::parse($rows->created_at)->format('d-M-Y')}}</td>
									<td>
										<form action="{{route('brands.destroy',$rows->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<a href="{{route('brands.edit', $rows->id)}}" class="btn btn-warning btn-xs btn-outline">Edit</a>
											<button class="btn btn-danger btn-xs btn-outline" type="submit" onclick="return confirm('Yakin Mau Dihapus Merek {{$rows->name}}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">Delete</button>
										</form> 
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@push('styles')
<link href="{{ asset('assets/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lib/select2/js/select2.min.js')}}"></script>
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
		$('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

	});
</script>
@endpush
