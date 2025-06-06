@extends('layouts.app')
@section('title')
<title>  Roisolar NG </title>
@endsection
@section('head')
<link rel="canonical" href="https://sanlivepharmacy.com/">
@endsection
@section('content')


@include('users.slider')


 {{-- <section class="team-layout1 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-40">
              <h3 class="heading__title">Our Solutions</h3>
              <p class="heading__desc">
                At ROISOLAR, we deliver customized solar energy systems designed to help you reduce electricity costs, achieve energy independence, and meet your sustainability goals. Whatever your energy needs, we provide smart, scalable solutions built for long-term performance
              </p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Member #1 -->
              <div class="member">
                  <img src="{{asset('images/Picture1.png')}}" alt="member img">
                <div class="member__info">
                  <h5 class="member__name">Roof Top Solar Solutions</h5>
                  <p class="member__desc">Whether you have an aluminum sheet, corrugated iron, concrete slab, or traditional tile roof, we engineer smart, site-specific solar systems built for Nigeria’s climate and structures. Our customized designs maximize available space, enhance energy output, and deliver strong, reliable returns for years to come</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture2.png')}}" alt="member img">
                </div>
                <div class="member__info">
                  <h5 class="member__name">Ground-Mounted Solar Solutions</h5>
                  <p class="member__desc">We deliver end-to-end execution for ground-mounted solar projects — from intelligent design and precision installation to seamless operations and maintenance.
                    Whether for open industrial spaces, farms, estates, or remote sites across Nigeria, our ground-mounted systems are engineered for maximum efficiency, durability, and energy yield across the full project lifecycle.
                    Transform your parking areas into clean energy hubs with ROISOLAR’s smart solar car park systems.
                    Our designs not only harness solar energy efficiently but also provide valuable shade and protection for vehicles and assets — turning unused spaces into high-performing energy generators with dual-purpose benefits.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #3 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture3.png')}}" alt="member img">
                  <ul class="social-icons list-unstyled mb-0">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Solar Car Park Solutions</a></h5>
                  <p class="member__desc">Transform your parking areas into clean energy hubs with ROISOLAR’s smart solar car park systems.
                    Our designs not only harness solar energy efficiently but also provide valuable shade and protection for vehicles and assets — turning unused spaces into high-performing energy generators with dual-purpose benefits.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #4 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture4.png')}}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name">Micro-Grid & Energy Storage Solutions</h5>
                  <p class="member__desc">ROISOLAR’s micro-grid and storage solutions integrate seamlessly with multiple energy sources—solar, batteries, grid power, and diesel generators—to deliver cost-effective and uninterrupted power. Designed for efficiency and energy independence, our systems reduce reliance on diesel, cut electricity costs, and provide critical backup power during grid failures or blackouts</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Team --> --}}

    <section class="team-layout1 pb-80">
  
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Member #1 -->
              <div class="member">
                  <img src="{{asset('images/s4.jpg')}}" alt="member img">
                  
              </div><!-- /.member -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/s4.jpg')}}" alt="member img">
                </div>
             
              </div><!-- /.member -->
              <!-- Member #3 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/s3.jpg')}}" alt="member img">
                  <ul class="social-icons list-unstyled mb-0">
                </div><!-- /.member-img -->
              
              </div><!-- /.member -->
              <!-- Member #4 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/s3.jpg')}}" alt="member img">
                </div><!-- /.member-img -->
                
                
              </div><!-- /.member -->
            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Team -->

  <!-- ========================
          Services Layout 1
      =========================== -->
      <section class="services-layout1 pt-130">
        <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/2.jpg') }}" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading text-center mb-60">
                <h2 class="heading__title ">Our Solutions</h2>
                <h3 class="heading__subtitle"><p>At ROISOLAR, we deliver customized solar energy systems designed to help you reduce electricity costs, achieve energy independence, and meet your sustainability goals. Whatever your energy needs, we provide smart, scalable solutions built for long-term performance
                </p>.</h3>
              </div><!-- /.heading -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
          <div class="row">
            <!-- service item #1 -->
            @forelse ($service as $serv)
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon">
                  <img src="{{asset('images/services/'.$serv->images)}}" alt="Product" loading="lazy">
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h4 class="service__title">{{ $serv->title }}</h4>
                  <p class="service__desc">{{ trim(strip_tags($serv->contents)) }}
                  </p>
                 
                  <a href="{{ route('service.details',encrypt($serv->id)) }}" class="btn btn__secondary btn__outlined btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            @empty
                
            @endforelse
          
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.Services Layout 1 -->




  <section class="banner-layout1 py-0">
      <div class="bg-img"><img src="{{asset('frontend/images/backgrounds/8.jpg')}}" alt="backgrounds"></div>
      <div class="top-banner bg-white">
        <div class="container">
          {{-- <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <p class="font-weight-bold mb-0"><h3>Roisolar is not just about energy.
                We are about empowering Africa — sustainably, reliably, and innovatively.</h3>
                <a href="#" class="color-secondary">
                  <span>Contact Us For More Information</span> <i class="icon-arrow-right"></i>
                </a>
              </p>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row --> --}}
        </div><!-- /.container -->
      </div><!-- /.top-banner -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="banner-text">
              <div class="heading-layout2 heading-light">
                <h2 class="heading__title">About Us</h2>
                <p class="heading__desc mb-40">At Roisolar, we are driving Africa’s transition toward a cleaner, more sustainable energy future. As a specialist engineering, procurement, and project management (EPCM) company, we deliver innovative, high-performance solar and energy storage solutions tailored for the Commercial and Industrial (C&I) sectors.
                </p>
              </div>
              <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled mb-50">
                <li>End-to-End Expertise</li>
                <li>Technical Excellence</li>
                <li>Client-Centric Approach</li>
                <li>Sustainability Commitment</li>
              </ul>
            </div><!-- /.banner-text -->
            <div class="fancybox-layout3">
              <!-- fancybox item #1 -->
              <div class="fancybox-item d-flex">

            <p> <span style="font-weight: bolder">
              Our seasoned team of engineers and energy specialists ensures every project meets the highest standards of quality, safety, and performance.
              </div><!-- /.fancybox-item -->
              <!-- fancybox item #2 -->
                 <div class="fancybox-item d-flex">
            From project development, design, and engineering to installation and ongoing operation and maintenance, we provide complete, in-house solar solutions.
                 </div>
            </div><!-- /.fancybox-layout3 -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6 banner-img">
            <div class="bg-img">
              <img src="" alt="backgrounds">
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Banner Layout 1 -->




     <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5 text-center">
      <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">Our Products</h1>
            
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      
    </section><!-- /.page-title -->

  <!-- ========================
       shop 
    =========================== -->
    <section class="shop-grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-8 col-lg-9">
            <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
              
              <select>
                <option selected="" value="0">Sort by latest</option>
                <option value="1">Sort by Popular</option>
                <option value="2">Sort by highest Price </option>
                <option value="3">Sort by lowest Price </option>
              </select>
            </div>
            <div class="row">
              <!-- Product item #1 -->
              @forelse ($products as $prods)
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="product-item">
                  <div class="product__img">
                    <img src="{{asset('images/products/'.$prods->image_path)}}" alt="Product" loading="lazy">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__rounded">
                        <i class="icon-cart"></i> <span>Add To Cart</span>
                      </a>
                    </div><!-- /.product-action -->
                  </div><!-- /.product-img -->
                  <div class="product__info">
                    <h4 class="product__title"><a href="{{ route('product.details',encrypt($prods->id)) }}">{{ $prods->name }}</a></h4>
                    <span class="product__price">${{ $prods->price }}</span>
                  </div><!-- /.product-content -->
                </div><!-- /.product-item -->
              </div><!-- /.col-lg-4 -->
              @empty
                  
              @endforelse
              
              <!-- Product item #2 -->
              {{-- <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="product-item">
                  <div class="product__img">
                    <img src="{{asset('frontend/images/blog/grid/pp.jpg')}}" alt="Product" loading="lazy">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__rounded">
                        <i class="icon-cart"></i> <span>Add To Cart</span>
                      </a>
                    </div><!-- /.product-action -->
                  </div><!-- /.product-img -->
                  <div class="product__info">
                    <h4 class="product__title"><a href="#">Biotin Complex</a></h4>
                    <span class="product__price">$12,99</span>
                  </div><!-- /.product-content -->
                </div><!-- /.product-item -->
              </div><!-- /.col-lg-4 --> --}}
              
            </div><!-- /.row -->
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                <nav class="pagination-area">
                  <ul class="pagination justify-content-center">
                    <li><a class="current" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                </nav><!-- /.pagination-area -->
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
          </div><!-- /.col-lg-9 -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <aside class="sidebar-layout2">
              <div class="widget widget-search">
                <h5 class="widget__title">Search</h5>
                <div class="widget__content">
                  <form class="widget__form-search">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn" type="submit"><i class="icon-search"></i></button>
                  </form>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-search -->
              {{-- <div class="widget widget-poducts">
                <h5 class="widget__title">Best Sellers</h5>
                <div class="widget__content">
                  <!-- product item #1 -->
                  <div class="widget-product-item d-flex align-items-center">
                    <div class="widget-product__img">
                      <a href="#"><img src="{{ asset('frontend/images/products/11.jpg') }}" alt="Product" loading="lazy"></a>
                    </div><!-- /.product-product-img -->
                    <div class="widget-product__content">
                      <h5 class="widget-product__title"><a href="#">Calming Herps</a></h5>
                      <span class="widget-product__price">$ 38.00</span>
                    </div><!-- /.widget-product-content -->
                  </div><!-- /.widget-product-item -->
                  <!-- product item #2 -->
                  <div class="widget-product-item d-flex align-items-center">
                    <div class="widget-product__img">
                      <a href="#"><img src="{{ asset('frontend/images/products/10.jpg') }}" alt="Product" loading="lazy"></a>
                    </div><!-- /.product-product-img -->
                    <div class="widget-product__content">
                      <h5 class="widget-product__title"><a href="#">Goji Powder</a></h5>
                      <span class="widget-product__price">$ 33.00</span>
                    </div><!-- /.widget-product-content -->
                  </div><!-- /.widget-product-item -->
                  <!-- product item #3 -->
                  <div class="widget-product-item d-flex align-items-center">
                    <div class="widget-product__img">
                      <a href="#"><img src="{{ asset('frontend/images/products/12.jpg') }}" alt="Product" loading="lazy"></a>
                    </div><!-- /.product-product-img -->
                    <div class="widget-product__content">
                      <h5 class="widget-product__title"><a href="#">Biotin Complex</a></h5>
                      <span class="widget-product__price">$ 18.00</span>
                    </div><!-- /.widget-product-content -->
                  </div><!-- /.widget-product-item -->
                </div><!-- /.widget-content -->
              </div><!-- /.widget-poducts --> --}}
              <div class="widget widget-categories">
                <h5 class="widget__title">Categories</h5>
                <div class="widget-content">
                  <ul class="list-unstyled mb-0">
                    @forelse ($categories as $item)
                    <li><a href="{{route('category.products',$item->id)}}"><i class="fa fa-star text-warning"></i>&nbsp;&nbsp;</span><span>{{ $item->name }}</span></a></li>

                    @empty
                        
                    @endforelse
                    
                  </ul>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-categories -->
              <div class="widget widget-filter">
                <h5 class="widget__title">Pricing Filter</h5>
                <div class="widget__content">
                  <div id="rangeSlider"></div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="price-output d-flex align-items-center">
                      <label for="rangeSliderResult">Price: </label>
                      <input type="text" id="rangeSliderResult" readonly>
                    </div>
                    <button class="btn__filter">Filter</button>
                  </div>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-filter -->
              <div class="widget widget-tags">
                <h5 class="widget__title">Tags</h5>
                <div class="widget-content">
                  <ul class="list-unstyled">
                    <li><a href="#">Responsive</a></li>
                    <li><a href="#">Fresh</a></li>
                    <li><a href="#">Modern</a></li>
                    <li><a href="#">Corporate</a></li>
                    <li><a href="#">Business</a></li>
                  </ul>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-Tags -->
            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.shop -->

        <section class="team-layout2 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-40">
              <h3 class="heading__title">Meet Our Team</h3>
              <p class="heading__desc">Our seasoned team of engineers and energy specialists ensures every project meets the highest standards of quality, safety, and performance.
              </p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
          

              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture5.png')}}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="#">Felix Udanyi</a></h5>
                  <p class="member__job">Chief Executive Officer & Founder</p>
                  <p class="member__desc">Felix Udanyi is a dynamic and results-driven professional whose career spans over 20 years across multiple industries, marked by a steadfast commitment to excellence, innovation, and strategic leadership.
                    He holds a Master’s Degree from the University of Liverpool, United Kingdom, and a Bachelor of Engineering in Electrical and Computer Engineering from the Federal University of Technology, Minna, Nigeria.
                  </p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <a href="#" class="btn btn__secondary btn__link btn__rounded">
                      <span>Read More</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->


                <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture6.png')}}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="#">Dr Zaiming Fan</a></h5>
                  <p class="member__job">Technical Partner</p>
                  <p class="member__desc">Dr. Zaiming Fan is an experienced R&D Director at Shenzhen Zhongnuo Communication Technology Co., Ltd., leading over 1,600 staff across communication, electronics, renewable energy, and UAV systems. With a Ph.D. from Lancaster University and 20+ years of experience, he specializes in ODM R&D management, wireless communication, renewable energy, and embedded systems.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <a href="#" class="btn btn__secondary btn__link btn__rounded">
                      <span>Read More</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
   
               <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture7.png')}}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="#">Peter Yuan Liu</a></h5>
                  <p class="member__job">Technical Partner</p>
                  <p class="member__desc">A seasoned Renewable Energy Engineer with over 15 years of experience in solar technology, product development, and R&D leadership. Since 2012, he has led innovation at Shenzhen Jiapu Solar Energy Co., LTD, as General Manger ,developing high-efficiency solar systems, advanced absorption coatings, and a range of industry-leading microinverters.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <a href="#" class="btn btn__secondary btn__link btn__rounded">
                      <span>Read More</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->

                <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture8.png')}}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="#">Abel Dangana</a></h5>
                  <p class="member__job">Strategic Relationship Executive</p>
                  <p class="member__desc">With over 25 years of experience in operations management and supply chain optimization, the SRO drives key partnerships, ensures operational efficiency, and supports the seamless execution of solar and energy storage projects.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <a href="#" class="btn btn__secondary btn__link btn__rounded">
                      <span>Read More</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->




            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Team -->



@endsection
