@extends('layouts.admin')
@section('content')
 <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{route('admin.package.update', $package->id)}}" enctype="multipart/form-data">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Update Package</h6>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="title"  value="{{$package->title}}" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder="Package Title">
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
                                    
                                    <textarea id="summernote" class="@error('description') is-invalid @enderror" name="description">{{$package->description}}</textarea>
                                     <small id="emailHelp" class="form-text text-muted">Package Description
                                            </small>
                                            @error('description')
                                            <span class="invalid-feedback"> <small> *</small> </span>
                                            @enderror
                                    </div>
                                         </div>
                                         
                                <div class="col-md-6">
                                                <img src="{{ asset('images/packages/'.$package->image) }}" width="100px" height="100px"> 
                                  <div class="custom-file">

                                            <input type="file"name="images" class="custom-file-input  @error('images') is-invalid @enderror" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose  Image</label>
                                            </div>
                                            <small id="emailHelp" class="form-text text-muted"> Choose Package Cover Image
                                            </small>
                                              @error('image')
                                            <span class="invalid-feedback"> <small> *</small> </span>
                                            @enderror
                                         </div>
                                               

                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="price"  value="{{$package->price}}" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder="Package Price">
                                            <small id="emailHelp" class="form-text text-muted">Enter Package Price
                                            </small>
                                            @error('price')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                            @enderror
                                        </div>
                                    </div> 


                                    <textarea id="summernotes" class="@error('usage_description') is-invalid @enderror" name="usage_description">{{$package->usage_description}}</textarea>
                                     <small id="emailHelp" class="form-text text-muted">Package Description
                                            </small>
                                            @error('usage_description')
                                            <span class="invalid-feedback"> <small> *</small> </span>
                                            @enderror
                                    </div>
                                         </div>

                                      <p></p>
                                         <button  type="submit" class="btn btn-primary w-50 p-3">Update Package</button>
                            </div> 
                        </div>
                    </form>
                    </div>

               </div>
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
toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
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