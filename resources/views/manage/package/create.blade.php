@extends('layouts.admin')
@section('content')

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert-message alert-danger">
            <button type="button" class="close-alert">&times;</button>
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert-message alert-success">
        <button type="button" class="close-alert">&times;</button>
        {{ session('success') }}
    </div>
@endif


    <div class="container-fluid">

        <form method="post" action="{{route('admin.package.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Create Package <a onclick="history.back()" class="btn btn-secondary"
                                    style="float:right"> return back</a></h6>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control @error('title') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project Title">
                                        <small id="emailHelp" class="form-text text-muted">Enter Package Title
                                        </small>
                                        @error('tile')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <textarea id="summernote" class="@error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                    <small id="emailHelp" class="form-text text-muted">Package Content
                                    </small>
                                    @error('description')
                                        <span class="invalid-feedback"> <small> *</small> </span>
                                    @enderror
                                </div>


                            </div>


                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file"name="images"
                                        class="custom-file-input  @error('images') is-invalid @enderror" id="customFile" >
                                    <label class="custom-file-label" for="customFile">Upload Image</label>
                                </div>
                                <small id="emailHelp" class="form-text text-muted"> Choose Package Cover Image
                                </small>
                                @error('images')
                                    <span class="invalid-feedback"> <small> *</small> </span>
                                @enderror
                            </div>

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="price" value="{{ old('price') }}"
                                            class="form-control @error('price') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Package Price">
                                        <small id="emailHelp" class="form-text text-muted">Enter Package Price
                                        </small>
                                        @error('price')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                             <div class="col-md-12">
                                <div class="form-group">

                                    <textarea id="summernotes" class="@error('usage_description') is-invalid @enderror" name="usage_description">{{ old('usage_description') }}</textarea>
                                    <small id="emailHelp" class="form-text text-muted">Package Usage Description
                                    </small>
                                    @error('usage_description')
                                        <span class="invalid-feedback"> <small> *</small> </span>
                                    @enderror
                                </div>


                            </div>

                            <p></p>
                            <button type="submit" class="btn btn-primary w-50 p-3">Add Package</button>
                        </div>
                    </div>
                </div>
         
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $('.clockpicker-example').clockpicker({
            autoclose: true
        });

        $('input[name="date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });

        let message = {!! json_encode(Session::get('message')) !!};
        let msg = {!! json_encode(Session::get('alert')) !!};
        //alert(msg);
        toastr.options = {
            timeOut: 3000,
            progressBar: true,
            showMethod: "slideDown",
            hideMethod: "slideUp",
            showDuration: 200,
            hideDuration: 200
        };
        if (message != null && msg == 'success') {
            toastr.success(message);
        } else if (message != null && msg == 'error') {
            toastr.error(message);
        }

        
    </script>

    <script>
    $(document).ready(function() {
        $('#summernotes').summernote({
            height: 200
        });
    });
</script>

@endsection
