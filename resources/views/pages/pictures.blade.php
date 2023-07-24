@extends('layouts.main')

@section('title')
    <title>Pictures</title>
@endsection


@section('body')
    @include('repeats.header')
    @include('repeats.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pictures</h1>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{session('success')}}.</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"/>

                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">

                            @foreach($pictures as $picture)

{{--                                <div class="text-center">--}}
                                    <img src="{{asset($picture->image)}}" alt="image"  class="img-thumbnail" >
{{--                                </div>--}}
                            @endforeach

                            <!-- Table with stripped rows -->
{{--                            <table class="table datatable">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">#</th>--}}
{{--                                    <th scope="col"> Image</th>--}}
{{--                                    <th scope="col">Date Created</th>--}}
{{--                                    <th scope="col"> </th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @php($i = 1)--}}
{{--                                @foreach($pictures as $picture)--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">{{$i++}}</th>--}}
{{--                                        <td><img src="{{asset($picture->image)}}" alt="image" width="60" height="100"/></td>--}}
{{--                                        <td>--}}
{{--                                            @if($picture->created_at == NULL)--}}
{{--                                                <span class="text-danger"> No Date Given</span>--}}
{{--                                            @else--}}
{{--                                                {{Carbon\Carbon::parse($picture->created_at)->diffForHumans() }}--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{url('edit-brand/'.$picture->id)}}" class="btn btn-info">Edit</a>--}}
{{--                                            <a href="{{url('delete-brand/'.$picture->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>--}}

{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Pictures</h5>

                            <form class="row g-3" action="{{route('storeImages')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Images</label>
                                    <input type="file" class="form-control" id="inputEmail4" name="image[]" multiple="">
                                    @error('images')

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



    @include('repeats.footer')
@endsection
