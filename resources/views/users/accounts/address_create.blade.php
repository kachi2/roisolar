@extends('layouts.app')

@section('title', 'Create Address')

@section('content')

<style>
    .address-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .form-control {
        height: 48px;
        border-radius: 8px;
        border: 1px solid #e5e5e5;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: none;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 6px;
    }

    .btn-submit {
        background: #0d6efd;
        color: #fff;
        height: 50px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background: #0b5ed7;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
    }
</style>

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">

        {{-- Sidebar --}}
        @include('includes.sidebarAccount')

        {{-- Main Content --}}
        <div class="col-md-8 mt-4">
            <div class="address-card">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="section-title">📍 Add New Address</h5>
                </div>

                <form method="POST" action="{{ route('users.address.store') }}">
                    @csrf

                    <div class="row g-3">

                        {{-- Name --}}
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter full name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Enter phone number">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div class="col-md-6">
                            <label class="form-label">Full Address</label>
                            <input type="text" name="address" value="{{ old('address') }}"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Street, Area, City">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Default checkbox --}}
                        <div class="col-12 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_default" id="is_default">
                                <label class="form-check-label" for="is_default">
                                    Set as default address
                                </label>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-submit w-100">
                                Save Address
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection