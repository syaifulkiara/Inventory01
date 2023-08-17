@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Supplier</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('home')}}">Home</a>
			</li>
			<li>
				<a href="{{route('suppliers.index')}}">Supplier</a>
			</li>
			<li class="active">
				<strong>Tambah</strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-2">
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>Tambah Data Supplier</h5>
			<div class="ibox-tools">
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-wrench"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#">Config option 1</a>
					</li>
					<li><a href="#">Config option 2</a>
					</li>
				</ul>
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="ibox-content">
			<form method="get" class="form-horizontal">
				<div class="form-group"><label class="col-sm-2 control-label">Normal</label>
					<div class="col-sm-10"><input type="text" class="form-control"></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group"><label class="col-sm-2 control-label">Help text</label>
					<div class="col-sm-10"><input type="text" class="form-control"> <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
					</div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group"><label class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group"><label class="col-sm-2 control-label">Placeholder</label>
					<div class="col-sm-10"><input type="text" placeholder="placeholder" class="form-control"></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group"><label class="col-lg-2 control-label">Disabled</label>
					<div class="col-lg-10"><input type="text" disabled="" placeholder="Disabled input here..." class="form-control"></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group"><label class="col-lg-2 control-label">Static control</label>
					<div class="col-lg-10"><p class="form-control-static">email@example.com</p></div>
				</div>
				<div class="hr-line-dashed"></div>
				<div class="form-group"><label class="col-sm-2 control-label">Select</label>
					<div class="col-sm-10"><select class="form-control m-b" name="account">
						<option>option 1</option>
						<option>option 2</option>
						<option>option 3</option>
						<option>option 4</option>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<a href="{{route('suppliers.index')}}" class="btn btn-danger btn-sm">Batal</a>
					<button class="btn btn-primary btn-sm" type="submit">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
@endsection