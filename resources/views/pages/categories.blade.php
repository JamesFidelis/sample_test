@extends('layouts.main')


@section('title')

    <title>Categories</title>

@endsection


@section('body')

  @include('repeats.header')
  @include('repeats.sidebar')



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Categories</h1>
        </div>
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
                            <h5 class="card-title">All Categories</h5>

                            <table class="table table-striped datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
{{--                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>--}}
                                        {{--                                        <td>{{$category->name }}</td>--}}
                                        <td>{{$category->user->name }}</td>
                                        <td>{{$category->category_name }}</td>
                                        <td>
                                            @if($category->created_at == NULL)
                                                <span class="text-danger"> No Date Given</span>
                                            @else
                                            {{Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('edit-category/'.$category->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('softdelete-category/'.$category->id)}}" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
{{--                            if needed to be in pages then use the code below--}}
{{--                           <div class="row">{{$categories->links()}}</div>--}}

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Category</h5>

                            <form class="row g-3" action="{{ route('add_categories')  }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="category_name">
                                    @error('category_name')

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
            <div class="row">
                <div class="col-lg-8">
{{--                    @if(session('successD'))--}}
{{--                        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                            <p>{{session('successD')}}.</p>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"/>--}}

{{--                        </div>--}}
{{--                    @endif--}}

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Trashed Categories</h5>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($trashCategory as $category)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        {{--                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>--}}
                                        {{--                                        <td>{{$category->name }}</td>--}}
                                        <td>{{$category->user->name }}</td>
                                        <td>{{$category->category_name }}</td>
                                        <td>
                                            @if($category->created_at == NULL)
                                                <span class="text-danger"> No Date Given</span>
                                            @else
                                                {{Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('restore-category/'.$category->id)}}" class="btn btn-success">Restore</a>
                                            <a href="{{url('delete-category/'.$category->id)}}" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--                            if needed to be in pages then use the code below--}}
                            {{--                           <div class="row">{{$categories->links()}}</div>--}}

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

  @include('repeats.footer')

@endsection

