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
                <li class="breadcrumb-item active">Create</li>
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
                      <h4>Info Umum</h4>

                  </div>
                  <div class="card-body">
                    <div class="basic-elements">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label style="font-weight:bold;">Nama:</label><br>
                            <h4>{{ $product->name }}</h4>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label style="font-weight:bold;">Category:</label><br>
                            <h4>{{ $product->category->name }}</h4>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <hr class="style">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label style="font-weight:bold;">Featured Image:</label><br>
                            @if($product->featured_image)
                              <img src="{{asset('images/'.$product->featured_image)}}" alt="logo" height="150" width="150">
                            @else
                              <p>Ga ada</p>
                            @endif
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label style="font-weight:bold;">Price:</label><br>
                            <h4>${{ $product->price }}</h4>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <hr class="style">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label style="font-weight:bold;">Stok :</label><br>
                            <h4>{{ $product->quantity }}</h4>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label style="font-weight:bold;">Description:</label><br>
                            <h4>{!! nl2br($product->description) !!}</h4>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <hr class="style">
                        </div>
                      </div>
                      <div class="dt-buttons">
                        <div class="sweetalert m-t-15">
                          <!-- <a href="{{route('product.store')}}" class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23">
                            <span>Submit</span>
                          </a> -->
                          <!-- <input style="cursor:pointer;border-radius:5px;" type="submit" class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" name="submit" value="Submit"> -->

                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-md m-b-10 m-l-5" name="button">Edit</a>
                        </div>
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
