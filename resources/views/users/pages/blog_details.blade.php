@extends('layouts.app')

@section('content')


<div class="ps-post ps-post--sidebar">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{route('index')}}">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blog</li>
        </ul>
        <div class="ps-post__content">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="ps-blog__banner">
                            <img src="{{$blog->image}}" alt="{{asset($blog->title)}}" style="width: 400px">
                             </div>
                    <h1 class="ps-post__title">{{$blog->title}}</h1>
                    <div class="ps-blog__meta"> <span class="ps-blog__date">Created: {{$blog->created_at->format('M d, Y')}}.</span>
                        <a class="ps-blog__author" href="">{{_('By'). ' '.$settings->site_name}}</a></div>
                    
                    <p class="ps-blog__text">{!! $blog->content !!}</p>
                </div>
                <div class="col-12 col-md-3">
                    <div class="ps-widget ps-widget--blog">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Latest Blogs</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content">
                                <div class="ps-widget__product">

                                    @forelse ($blogs as $item)
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail">
                                            <a class="ps-product__image" href="{{route('blogs.details',$item->hashid)}}">
                                                <figure><img src="{{$item->image}}" alt="{{$item->title}}"><img src="{{$item->image}}" alt="{{$item->title}}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('blogs.details',$item->hashid)}}">{!! $item->title !!}</a></h5>
                                            </div>
                                        </div>

                                        
                                    @empty
                                        
                                    @endforelse


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
@endsection