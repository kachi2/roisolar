@extends('layouts.app')
@section('title')
<title>Roisolar NG</title>
@endsection

@section('styles')
<style>
    .solar-package-card {
        display: flex;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 900px;
        margin: 20px auto;
    }

    /* .solar-package-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    gap: 40px;
    margin: 80px 0;
    overflow: hidden;
} */


    .package-left, .package-right {
        padding: 20px;
        flex: 1;
    }

    .package-center {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e0e0e0;
    }

    .package-title {
        font-size: 20px;
        margin-bottom: 10px;
        color: #f39e1f;
    }

    .package-desc {
        font-size: 12px;
        color: #555;
    }

    .package-label {
        display: inline-block;
        background-color: #ff9800;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .package-price {
        font-size: 28px;
        color: #333;
        margin-bottom: 15px;
    }

    .usage-desc {
        font-size: 12px;
        color: #555;
        margin-bottom: 20px;
    }

    .shop-now-btn {
        display: inline-block;
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }
    .shop-now-btn:hover {
        background-color: #45a049;
    }

.package-price {
    font-size: 30px;
    font-weight: 800;
    color: #0a7d2e;
    margin: 15px 0;

    /* animation: zoomPulse 2s infinite ease-in-out; */
}

/* @keyframes zoomPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.08); }
    100% { transform: scale(1); }
} */


.package-center img {
    max-width: 100%;
    animation: floatImage 4s ease-in-out infinite;
}

@keyframes floatImage {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}


     /* .solar-package-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    gap: 30px;
    margin: 60px 0;
    transition: 0.3s ease;
}

.solar-package-card:hover {
    transform: translateY(-5px);
}


.package-left {
    flex: 1;
}

.package-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
}

.package-desc {
    color: #555;
    line-height: 1.6;
}




.package-center {
    flex: 1;
    text-align: center;
}

.package-center img {
    max-width: 100%;
    height: auto;
}


.package-right {
    flex: 1;
    text-align: right;
}

.package-label {
    font-size: 14px;
    text-transform: uppercase;
    color: #888;
    letter-spacing: 1px;
}

.package-price {
    font-size: 40px;
    font-weight: 800;
    color: #0a7d2e;
    margin: 15px 0;

    animation: zoomPulse 2s infinite ease-in-out;
}

@keyframes zoomPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.08); }
    100% { transform: scale(1); }
}


.usage-desc {
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
}

.shop-now-btn {
    display: inline-block;
    padding: 12px 30px;
    background: #0a7d2e;
    color: #fff;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s ease;
}

.shop-now-btn:hover {
    background: #065c20;
} */



@media (max-width: 992px) {

    .solar-package-card {
        flex-direction: column;
        text-align: center;
    }

    .package-right {
        text-align: center;
    }

    .package-price {
        font-size: 32px;
    }

}





</style>
@endsection

@section('content')

@foreach ($package as  $sp)
<div class="solar-package-card">

    <!-- LEFT SECTION -->
    <div class="package-left">
        <h3 class="package-title">{{$sp->title}}</h3>
        <p class="package-desc">
            {{ Str::limit(strip_tags($sp->description), 250) }}
        </p>
    </div>

    <!-- CENTER IMAGE -->
    <div class="package-center">
        <img src="{{ asset('images/packages/'.$sp->image) }}" alt="Solar Package">
    </div>

    <!-- RIGHT SECTION -->
    <div class="package-right">
        <span class="package-label">Total Package</span>

        <h2 class="package-price">&#8358; {{ number_format($sp->price, 2) }}</h2>

        <p class="usage-desc">
           <B>APPLIANCES:</B> {{ Str::limit(strip_tags($sp->usage_description), 200) }}
        </p>

        <a href="{{ route('contact-us') }}" class="shop-now-btn">Contact Us</a>
    </div>

</div>

@endforeach


@endsection

@section('script')

@endsection