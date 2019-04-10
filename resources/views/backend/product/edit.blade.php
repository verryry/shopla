@extends('backend.layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Product</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
      <!-- /# row -->
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-title">
                      <h4>Create Product</h4>

                  </div>
                  <div class="card-body">
                      <div class="basic-elements">
                          <form action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                              <div class="row">
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" class="form-control" placeholder="Name Product" value="{{ $product->name }}">
                                      </div>
                                      <label>Feature Image</label>
                                      <div class="form-group dropzone">
                                          <input class="form-control" name="featured_image" type="file" multiple/>
                                      </div>
                                      @if($product->featured_image)
                                      <img src="{{asset('images/'.$product->featured_image)}}" alt="logo" height="150" width="150">
                                      @else
                                      <p>Ga ada</p>
                                      @endif
                                      <div class="form-group">
                                          <label>Category</label>
                                          <select class="form-control" name="id_category">
                                            <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                                            @foreach($category as $categorys)
                                            <option value="{{ $categorys->id }}">{{ $categorys->name }}</option>\
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" min="0" name="price" class="form-control" placeholder="Price Product" value="{{$product->price}}">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Size</label>
                                        <select class="form-control" name="size">
                                          <option value="null">Chooise Size</option>
                                          <option value="S">S</option>
                                          <option value="M">M</option>
                                          <option value="L">L</option>
                                          <option value="XL">XL</option>
                                          <option value="XXL">XXL</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input class="form-control" min="0" type="number" name="quantity" placeholder="Quantity" value="{{$product->quantity}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripton</label>
                                        <textarea style="height:auto !important;" class="form-control" rows="10" name="description" placeholder="Descripton Product">{{$product->description}}</textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="dt-buttons">
                                <div class="sweetalert m-t-15">
                                  <!-- <a href="{{route('product.store')}}" class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23">
                                    <span>Submit</span>
                                  </a> -->
                                  <!-- <input style="cursor:pointer;border-radius:5px;" type="submit" class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" name="submit" value="Submit"> -->
                                  <button class="btn btn-info btn sweet-success" type="submit">Submit</button>
                                </div>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
</div>
@endsection
