@extends('layouts.front')

@section('content')
<div class="cards">
	<div class="row row-sm mg-t-20">
		@if($products->isNotEmpty())
		@foreach($products as $item)
		<div class="col-lg-3 mb-4">
			<div class="card card-block bd-0 shadow-base pd-20">
				<center><a href="{{route('main.detail', $item->slug)}}"><img src="{{asset($item->images)}}" class="img-fluid" alt=""></a></center>
				<div class="d-flex justify-content-between align-items-center mg-t-20">
					<div>
						<h6 class="tx-14 tx-normal mg-b-2"><a href="{{route('main.detail', $item->slug)}}" class="tx-inverse"><strong>{{$item->name}}</strong></a></h6>
						<span class="tx-12">Brand : {{ $item->brand->name }}</span>
					</div>
					<div class="tx-right">
						<span class="tx-warning d-block">
							<i class="icon ion-star"></i>
							<i class="icon ion-star"></i>
							<i class="icon ion-star"></i>
							<i class="icon ion-star"></i>
							<i class="icon ion-star tx-gray-lighter"></i>
						</span>
						<span class="tx-12">Tersedia ( {{$item->stock}} )</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
@else 
<div style="margin: auto;">
<div class="alert alert-danger alert-bordered pd-y-20" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
    <div>
      <h5 class="mg-b-2 tx-danger">Oh snap! Change a few things up and try submitting again.</h5>
      <p class="mg-b-0 tx-gray">Neque porro quisquam est, qui dolorem ipsum...</p>
    </div>
  </div><!-- d-flex -->
</div><!-- alert -->
</div>
@endif
</div>
<div class="ht-80 bd d-flex align-items-center justify-content-center">
	<ul class="pagination pagination-basic pagination-circle mg-b-0">
		{!! $products->links() !!}
	</ul>
</div>
@endsection