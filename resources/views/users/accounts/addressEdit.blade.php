@extends('layouts.app')

@section('title', 'Edit Address')

@section('content')

<style>
    .address-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    .form-control {
        border-radius: 8px;
        height: 45px;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 6px;
        color: #555;
    }

    .btn-save {
        background: #28a745;
        color: #fff;
        border-radius: 8px;
        padding: 10px 20px;
        border: none;
        transition: 0.3s;
    }

    .btn-save:hover {
        background: #218838;
    }

    .page-title {
        font-weight: 600;
        font-size: 20px;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
    }
</style>

<div class="ps-shopping py-5" style="background: #f5f6f8;">
    <div class="container">
        <div class="row">
            
            @include('includes.sidebarAccount')

            <div class="col-lg-8 col-md-7">
                <div class="address-card mt-4">

                    <!-- Title -->
                    {{-- <div class="d-flex justify-content-between align-items-center pb-2 border-bottom mb-3">
                        <h4 class="page-title">Edit Address</h4>
                        <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">
                            ← Back
                        </a>
                    </div> --}}


  <a href="{{ route('users.account.address') }}" class="btn btn-light btn-sm">
    ← Back
</a>
                    <!-- Form -->
                    <form method="POST" action="{{ route('users.address.update', $address->hashid) }}">
                        @csrf

                        <div class="row g-3">

                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name"
                                       value="{{ old('name', $address->name) }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter full name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone"
                                       value="{{ old('phone', $address->phone) }}"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       placeholder="Enter phone number">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email"
                                       value="{{ old('email', $address->email) }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Enter email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <label class="form-label">Full Address</label>
                                <input type="text" name="address"
                                       value="{{ old('address', $address->address) }}"
                                       class="form-control @error('address') is-invalid @enderror"
                                       placeholder="Enter full address">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city"
                                       value="{{ old('city', $address->city) }}"
                                       class="form-control @error('city') is-invalid @enderror"
                                       placeholder="Enter city">
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Default Checkbox -->
                            <div class="col-12 mt-2">
                                <div class="form-check d-flex align-items-center">
                                    <input type="checkbox"
                                           name="is_default"
                                           value="1"
                                           class="form-check-input me-2"
                                           {{ $address->is_default ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Set as Default Address
                                    </label>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn-save w-100">
                                    Update Address
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection