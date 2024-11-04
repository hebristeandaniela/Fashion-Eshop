@extends('frontend.layouts.master')

@section('title','E-SHOP || Order Track Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Acasă<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Urmărirea comenzii</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
           <p>Pentru a vă urmări comanda, introduceți ID-ul comenzii în caseta de mai jos și apăsați butonul "Urmărește comanda". Acest lucru v-a fost dat pe chitanță și în e-mailul de confirmare pe care ar fi trebuit să-l primiți.</p> <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="Enter your order number">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Urmărește comanda</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection