@extends('layouts.app')
@section('title')
<title> Addresses | Sanlive Pharmarcy</title>
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

                    <div class="row">
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> {{_('<< back ')}} </a> <hr style="width:100%"></span>
                      
                        <div class="col-12 col-md-12" >
                            <span style="float:right"> 
                                <a href="{{route('users.address.create')}}" class="btn btn-primary "> Add New Address</a>
                               
                            </span> 
                       </div>
                      
                        @forelse ($addresses as $address)
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__conent" style="border-right:0px">
                                    <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                        <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                                            Shipping Address @if($address->is_default == 1) <small style="font-size: 10px; color:rgb(117, 131, 242)"> Default</small> @endif
                                            <span style="float: right"> <a href="{{route('users.address.edit', $address->hashid)}}"> <i class="icon-pen"></i> </a>
                                                <a href="{{route('users.address.delete', $address->hashid)}}"  onclick="return confirm('Are you, you want to delete this Address?')">  &nbsp; &nbsp;<i class="badge badge-danger">X</i> </a>  </span>
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


                                </div>
                            </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__conent" style="border-right:0px">
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
                                </div>
                            </div>
                        </div>
                        </div>

                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection



