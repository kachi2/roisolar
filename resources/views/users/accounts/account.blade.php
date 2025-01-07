@extends('layouts.app')
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
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                    style="border:2px solid #d1d5dad4; border-radius:10px">
                                    <div class="ps-product__conent" style="border-right:0px">
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                            <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                                    Account Information
                                            </p>
                                            <hr>
                                            <div class="ps-product__meta">
                                                <span class="ps-product__price"
                                                    style="font-size:15px; "> {{ucfirst($account->first_name .' '.$account->last_name )}} </span>
                                            </div>
                                            <ul class="ps-product__list">
                                                <li> <span class="ps-list__title"> </span>{{$account->email}}
                                                </li>
                                                <li> <span class="ps-list__title"> </span>{{$account->phone??null}}
                                            </li>
                                                <li> <span class="ps-list__title"> </span>Last Login: {{$account->last_login}}
                                            </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__conent" style="border-right:0px">
                                    @if(isset($address))
                                    <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                        <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                                          Shipping Address <small style="font-size: 10px; color:rgb(117, 131, 242)"> Default</small>
                                            <span style="float: right"> <a href=""> <i class="icon-pen"></i> </a> </span>
                                        </p>
                                        <hr>
                                        <div class="ps-product__meta">
                                            <span class="ps-product__price"
                                                style="font-size:15px; "> {{ucfirst($address->name  )}} </span>
                                        </div>
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title"> </span>{{$address->email}} | {{$address->phone??null}}
                                            </li>
                                            <li> <span class="ps-list__title"> </span>
                                                {{$address->address}} | {{$address->city}} | {{$address->state }} {{_('state')}} | {{$address->country}}   
                                        </li>
                                        </ul>
                                    </div>
                                    @else 
                                    <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                        <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                                          Shipping Address <small style="font-size: 10px; color:rgb(117, 131, 242)"> Default</small>
                                            <span style="float: right"> <a href=""> <i class="icon-pen"></i> </a> </span>
                                        </p>
                                        <hr>
                                        
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title"> </span>You don't have a shippig address yet <br>
                                                <a href="{{route('users.address.create')}}" class="btn btn-info">Add Shipping Address</a>
                                             
                                        </li>
                                        </ul>
                                    </div>

                                    @endif


                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
@endsection
