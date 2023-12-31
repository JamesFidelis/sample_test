@extends('layouts.main')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Hi, {{Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="container">

            <div class="row">


                <div class="col-lg-11">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users Table</h5>

                            <!-- Table with stripped rows -->
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
{{--           only use this code if you are not usig the query builder                             <td>{{$user->created_at->diffForHumans() }}</td>--}}
                                        <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>


                </div>

            </div>

        </div>

</x-app-layout>
