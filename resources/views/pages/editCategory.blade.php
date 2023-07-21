@extends('layouts.main')


@section('title')

    <title>Edit Category</title>

@endsection


@section('body')

    @include('repeats.header')
    @include('repeats.sidebar')



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Category</h1>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Category</h5>

                            <form class="row g-3" action="{{url('update-category/'.$categories->id)}}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Update Category name</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="category_name" value="{{$categories->category_name}}">
                                    @error('category_name')

                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main><!-- End #main -->

    @include('repeats.footer')

@endsection

