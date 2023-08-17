@extends('layouts.master')

@section('content')
<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Dashboard</h4>
    <p class="mg-b-0">Welcome, admin</p>
  </div>
</div>

<div class="br-pagebody">
  <div class="row row-sm">
    <div class="col-sm-6 col-xl-3">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <img src="{{ asset('assets/img/users.png')}}" alt="" width="80px" height="80px">
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-10">Users</p>
          <p class="tx-24 tx-lato tx-bold mg-b-0 lh-1">{{ $users->count() }}</p>
          <a href=""><span class="tx-11 tx-roboto">Add New User</span></a>
        </div>
      </div>
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <img src="{{ asset('assets/img/category.png')}}" alt="" width="80px" height="80px">
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-10">Category</p>
          <p class="tx-24 tx-lato tx-bold mg-b-0 lh-1">{{ $categories->count() }}</p>
          <a href="{{ route('categories.index') }}"><span class="tx-11 tx-roboto">Add Category</span></a>
        </div>
      </div>
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <img src="{{ asset('assets/img/product.png')}}" alt="" width="80px" height="80px">
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-10">Products</p>
          <p class="tx-24 tx-lato tx-bold mg-b-0 lh-1">{{ $products->count() }}</p>
          <a href="{{ route('products.create') }}"><span class="tx-11 tx-roboto">Add Product</span></a>
        </div>
      </div>
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3">
      <div class="pd-x-20 pd-t-20 d-flex align-items-center">
        <img src="{{ asset('assets/img/sale.png')}}" alt="" width="70px" height="70px">
        <div class="mg-l-20">
          <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-10">Transaction</p>
          <p class="tx-24 tx-lato tx-bold mg-b-0 lh-1">1,975,224</p>
          <a href=""><span class="tx-11 tx-roboto">24% higher yesterday</span></a>
        </div>
      </div>
    </div><!-- col-3 -->
  </div><!-- row -->
</div>

<div class="br-pagebody pd-x-20 pd-sm-x-30">
  

  <div class="row row-sm mg-t-20">
    <div class="col-lg-6">
      <div class="card shadow-base bd-0">
        <div class="card-header bg-transparent pd-20">
          <h6 class="card-title tx-uppercase tx-12 mg-b-0">Transaction History</h6>
        </div><!-- card-header -->
        <table class="table table-responsive mg-b-0 tx-12">
          <thead>
            <tr class="tx-10">
              <th class="wd-10p pd-y-5">&nbsp;</th>
              <th class="pd-y-5">User</th>
              <th class="pd-y-5">Type</th>
              <th class="pd-y-5">Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/500" class="wd-36 rounded-circle" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Mark K. Peters</a>
                <span class="tx-11 d-block">TRANSID: 1234567890</span>
              </td>
              <td class="tx-12">
                <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Email verified
              </td>
              <td>Just Now</td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/500" class="wd-36 rounded-circle" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Karmen F. Brown</a>
                <span class="tx-11 d-block">TRANSID: 1234567890</span>
              </td>
              <td class="tx-12">
                <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Pending verification
              </td>
              <td>Apr 21, 2017 8:34am</td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/500" class="wd-36 rounded-circle" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Gorgonio Magalpok</a>
                <span class="tx-11 d-block">TRANSID: 1234567890</span>
              </td>
              <td class="tx-12">
                <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Purchased success
              </td>
              <td>Apr 10, 2017 4:40pm</td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/500" class="wd-36 rounded-circle" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Ariel T. Hall</a>
                <span class="tx-11 d-block">TRANSID: 1234567890</span>
              </td>
              <td class="tx-12">
                <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Payment on hold
              </td>
              <td>Apr 02, 2017 6:45pm</td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/500" class="wd-36 rounded-circle" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                <span class="tx-11 d-block">TRANSID: 1234567890</span>
              </td>
              <td class="tx-12">
                <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
              </td>
              <td>Mar 30, 2017 10:30am</td>
            </tr>
          </tbody>
        </table>
        <div class="card-footer tx-12 pd-y-15 bg-transparent">
          <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>
        </div><!-- card-footer -->
      </div><!-- card -->
    </div><!-- col-6 -->
    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
      <div class="card shadow-base bd-0">
        <div class="card-header pd-20 bg-transparent">
          <h6 class="card-title tx-uppercase tx-12 mg-b-0">Product Purchases</h6>
        </div><!-- card-header -->
        <table class="table table-responsive mg-b-0 tx-12">
          <thead>
            <tr class="tx-10">
              <th class="wd-10p pd-y-5">&nbsp;</th>
              <th class="pd-y-5">Item Details</th>
              <th class="pd-y-5 tx-right">Sold</th>
              <th class="pd-y-5">Gain</th>
              <th class="pd-y-5 tx-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/800x533" class="wd-55" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">The Dothraki Shoes</a>
                <span class="tx-11 d-block"><span class="square-8 bg-danger mg-r-5 rounded-circle"></span> 20 remaining</span>
              </td>
              <td class="valign-middle tx-right">3,345</td>
              <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>33.34%</span> from last week</td>
              <td class="valign-middle tx-center">
                <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
              </td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/800x533" class="wd-55" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Westeros Sneaker</a>
                <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
              </td>
              <td class="valign-middle tx-right">720</td>
              <td class="valign-middle"><span class="tx-danger"><i class="icon ion-android-arrow-down mg-r-5"></i>21.20%</span> from last week</td>
              <td class="valign-middle tx-center">
                <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
              </td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/800x533" class="wd-55" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Selonian Hand Bag</a>
                <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
              </td>
              <td class="valign-middle tx-right">1,445</td>
              <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>23.34%</span> from last week</td>
              <td class="valign-middle tx-center">
                <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
              </td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/800x533" class="wd-55" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Kel Dor Sunglass</a>
                <span class="tx-11 d-block"><span class="square-8 bg-warning mg-r-5 rounded-circle"></span> 45 remaining</span>
              </td>
              <td class="valign-middle tx-right">2,500</td>
              <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>28.78%</span> from last week</td>
              <td class="valign-middle tx-center">
                <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
              </td>
            </tr>
            <tr>
              <td class="pd-l-20">
                <img src="https://via.placeholder.com/800x533" class="wd-55" alt="Image">
              </td>
              <td>
                <a href="" class="tx-inverse tx-14 tx-medium d-block">Kubaz Sunglass</a>
                <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
              </td>
              <td class="valign-middle tx-14 tx-right">223</td>
              <td class="valign-middle"><span class="tx-danger"><i class="icon ion-android-arrow-down mg-r-5"></i>18.18%</span> from last week</td>
              <td class="valign-middle tx-center">
                <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="card-footer tx-12 pd-y-15 bg-transparent">
          <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Products</a>
        </div><!-- card-footer -->
      </div><!-- card -->
    </div><!-- col-6 -->
  </div>
</div>

<footer class="br-footer">
  <div class="footer-left">
    <div class="mg-b-2">Copyright &copy; 2023 - {{date('Y')}}. {{ config('app.name', 'Laravel') }}.</div>
    <div>Attentively and carefully made by ThemePixels.</div>
  </div>
  <div class="footer-right d-flex align-items-center">
    <span class="tx-uppercase mg-r-10">Share:</span>
    <a target="_blank" class="pd-x-5" href=""><i class="fab fa-facebook tx-20"></i></a>
    <a target="_blank" class="pd-x-5" href=""><i class="fab fa-twitter tx-20"></i></a>
  </div>
</footer>
@endsection
