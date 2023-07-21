@extends('layouts.main')


@section('title')
    <title>Brands</title>

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
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col"> Brand Position</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$brand->brand_name }}</td>
                                        <td><img src="" alt="image"/></td>
                                        <td>
                                            @if($brand->created_at == NULL)
                                                <span class="text-danger"> No Date Given</span>
                                            @else
                                                {{Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('edit-brand/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('softdelete-brand/'.$brand->id)}}" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Brand</h5>

                            <form class="row g-3" action="{{ route('add_categories')  }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Brand Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="brand_name">
                                    @error('brand_name')

                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Brand Image</label>
                                    <input type="file" class="form-control" id="inputEmail4" name="brand_image">
                                    @error('brand_image')

                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->



    @include('repeats.footer')
@endsection

