@extends('layouts.app')
@section('title')
<title> Edit Address | Sanlive Pharmarcy</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              @include('includes.accountSidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                   <form method="post" action="{{route('users.address.update', $address->hashid)}}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius:10px">
                            <p class="m-4" style="color:#332d2d"> <i class="fa fa-check-square-o"
                                    style="color:rgb(79, 81, 79)"></i>
                                Edit Address </p>
                            <hr>
                            <div class="row m-3">
                                <div class="col-12 col-md-6 ">
                                    <div class="ps-form__group">
                                        <label for="name" style="color:rgb(114, 111, 111)"> Full Name</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input @error('name') is-invalid @enderror" type="text"
                                            value="{{$address->name}}" placeholder="Full name" id="name" name="name">
                                    </div>
                                    @error('name')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="phone" style="color:rgb(114, 111, 111)"> Phone Number</label>
                                        <input class="form-control ps-form__input @error('phone') is-invalid @enderror" type="text"
                                            placeholder="Phone Number" id="phone"  value="{{$address->phone}}" name="phone">
                                    </div>
                                    @error('phone')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="row m-3">
                                 <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label for="email" style="color:rgb(114, 111, 111)"> Email Address</label>
                                        <input class="form-control ps-form__input @error('email') is-invalid @enderror" type="email"
                                            placeholder="Email Address"  id="email" value="{{$address->email}}" name="email">
                                    </div>
                                    @error('email')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="address" style="color:rgb(114, 111, 111)"> Full Address </label>
                                        <input class="form-control ps-form__input @error('address') is-invalid @enderror" type="text"
                                            placeholder="Full Address" id="address" value="{{$address->address}}" name="address">
                                    </div>
                                    @error('address')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <!--<div class="col-12 col-md-4 mt-1">-->
                                <!--    <div class="ps-form__group">-->
                                <!--        <label id="city" style="color:rgb(114, 111, 111)"> City</label>-->
                                <!--        <input class="form-control ps-form__input @error('city') is-invalid @enderror" type="text"-->
                                <!--            placeholder="Enter City and State"  id="city" value="{{$address->city}}" name="city">-->
                                <!--    </div>-->
                                <!--    @error('city')-->
                                <!--    <span class="alert alert-danger" role="error">-->
                                <!--        {{$message}}-->
                                <!--    </span>-->
                                <!--    @enderror-->
                                <!--</div>-->
                                <!--<div class="col-12 col-md-4 mt-1">-->
                                <!--    <div class="ps-form__group">-->
                                <!--        <label id="state" style="color:rgb(114, 111, 111)"> State</label>-->
                                <!--        <input class="form-control ps-form__input @error('state') is-invalid @enderror" type="text"-->
                                <!--            placeholder="Enter City and State"  id="state" value="{{$address->state}}" name="state">-->
                                <!--    </div>-->
                                <!--    @error('state')-->
                                <!--    <span class="alert alert-danger" role="error">-->
                                <!--        {{$message}}-->
                                <!--    </span>-->
                                <!--    @enderror-->
                                <!--</div>-->
                                <!--<div class="col-12 col-md-4 mt-1">-->
                                <!--    <div class="ps-form__group">-->
                                <!--        <label id="country" style="color:rgb(114, 111, 111)">Country </label>-->
                                <!--        <input class="form-control ps-form__input @error('country') is-invalid @enderror" type="text"-->
                                <!--            placeholder="Country"  id="country" value="{{$address->country}}" name="country">-->
                                <!--    </div>-->
                                <!--    @error('country')-->
                                <!--    <span class="alert alert-danger" role="error">-->
                                <!--        {{$message}}-->
                                <!--    </span>-->
                                <!--    @enderror-->
                                <!--</div>-->
                                <div class="  " style="display: flex; color:rgb(114, 111, 111); align-items:center;">
                                     <input style="color:rgb(114, 111, 111); width:18px" value="1" type="checkbox" name="is_default" id="is_default" @if($address->is_default == 1) checked @endif>  
                                     <label for="is_default" class="pl-2"> Set as Default Address  </label> 
                                    </div>
                                <div class="m-4" style="float: right;">
                                    <button class="ps-btn ps-btn--success w-100" style="border-radius: 5px"> Update Address</button>
                                </div>
                            </div>
                        </div>
                    </div>
                   </form>

                </div>



            </div>

        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
@endsection
