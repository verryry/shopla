
@extends('backend.layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Product</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{route('product.create') }}" class="btn btn-info btn-rounded" name="button">Add Product</a>
                      <div class="table-responsive m-t-0">
                          <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Category</th>
                                      <th>Featured Image</th>
                                      <th>Price</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($product as $products)
                                  <tr>
                                      <td><a href="{{ route('product.show',$products->id) }}">{{ $products->name }}</a></td>
                                      <td>{{ $products->category->name }}</td>
                                      <td>
                                        @if($products->featured_image)
                                        <img src="{{asset('images/'.$products->featured_image)}}" alt="logo" height="50" width="50">
                                      @else
                                        <p>Ga ada</p>
                                      @endif
                                    </td>
                                      <td>${{ $products->price }}</td>
                                      <td>
                                        <a href="{{ route('product.edit', $products->id) }}" class="btn btn-warning btn-rounded" name="button">Edit</a>
                                        <form action="{{ route('product.destroy',$products->id) }}" method="POST">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="submit" class="btn btn-danger btn-rounded" value="Delete"/>
                                        </form>
                                      </td>
                                      <!-- <td><a href="{{route('product.create') }}" class="btn btn-info" name="button">Delete</a></td> -->
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
        <!-- End PAge Content -->
    </div>
</div>
@endsection
