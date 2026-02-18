@extends('layouts.admin')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Packages</h6>
                                <div>
                                    <a href="{{route('admin.package.create')}}" class="btn btn-info">Create Package</a>
                                    <a href="#" class="mr-3">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Usage Description</th>
                                                 <th>Created At</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        @forelse ($package as  $sp)
                                            <tr>
                                                <td>
                                                    <a href="#">{{$sp->title}}</a>
                                                </td>
                                                <td>
                                                    {{-- <img src="{{ asset('storage/' . $sp->images->first()->image_path) }}" width="100px" height="100px">  --}}
                                                   
                                                    <img src="{{ asset('images/packages/'.$sp->image) }}" width="100px" height="100px"> 
                                                </td>
                                                    {{-- @php
                                                    dd($sp->images->first()->image_path);
                                                    @endphp --}}

                                                <td>
                                                    <a href="#">{{ Str::limit(strip_tags($sp->description), 100) }}</a>
                                                </td>

                                                  <td>
                                                    <a href="#">&#8358;{{ number_format($sp->price, 2) }}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{ Str::limit(strip_tags($sp->usage_description), 100) }}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$sp->created_at->format('d/M/y')}}</a>
                                                </td>
                                               
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                 <a href="{{route('admin.package.edit', $sp->id)}}" class="dropdown-item">Edit Package</a>
                                                    
                                                            <form method="post" action="{{route('admin.package.delete', $sp->id)}}" id="form1"> 
                                                            @csrf  
                                                              <button type="submit" onclick="return confirm('Are you sure you want to delete package')" class="dropdown-item" style="color:red">Delete</button>
                                                             </form>
                                                       
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                              @empty
                                              <tr>
                                              <td> No data available </td>
                                              </tr>
                                              @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                  </div>

@endsection
@section('script')
<script>
$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="audition_date"]').daterangepicker({
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
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}
</script>
@endsection