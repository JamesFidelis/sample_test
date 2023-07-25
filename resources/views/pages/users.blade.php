@extends('layouts.main')


@section('title')

    <title>Users</title>

@endsection


@section('body')
    @include('repeats.header')
    @include('repeats.sidebar')



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users Data</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">  <h5 class="card-title">Users </h5></div>
                                <div class="col-md-2 mt-2"> <span class="btn btn-info">{{$users->count()}}</span></div>
                            </div>


                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Start Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$user->name }}</td>
                                        <td>{{$user->email }}</td>
                                        <td>{{$user->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->



    @include('repeats.footer')


@endsection
