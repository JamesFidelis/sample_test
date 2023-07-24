@extends('layouts.main')

@section('title')
    <title>Edit Brand</title>

@endsection


@section('body')

    @include('repeats.header')
    @include('repeats.sidebar')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Brands</h1>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Brand</h5>

                            <form class="row g-3" action="{{ url('/update-brand/'.$brand->id)  }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Update Brand Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="brand_name" value="{{$brand->brand_name}}">
                                    @error('brand_name')

                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Update Brand Image</label>
                                    <input type="file" class="form-control" id="inputEmail4" name="brand_image" value="{{$brand->brand_image}}">
                                    @error('brand_image')

                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                    <div class="form-group">
                                        <img src="{{asset($brand->brand_image)}}" width="60" height="100" class="rounded mx-auto d-block">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main>


    @include('repeats.footer')
@endsection
