@extends('layouts.main')


@section('title')
    <title>Register</title>
@endsection

@section('body')



    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{{route('home')}}" class="logo d-flex align-items-center w-auto">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="">
                                    <span class="d-none d-lg-block">TestProject</span>
                                </a>
                            </div>
                            <!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST" action="{{route('register') }}">
                                        @csrf
                                        @if(session('errors'))
                                            @error('email')
                                            <p class="alert alert-danger">{{$message}}</p>
                                            @enderror
                                        @endif
                                        <div class="col-12">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="name" required autofocus autocomplete="name">
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
{{--                                                <span class="input-group-text" id="inputGroupPrepend">@</span>--}}
                                                <input type="email" name="email" class="form-control" id="email"  required autocomplete="email">
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" required autocomplete="new-password" >
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-password">
                                            <div class="invalid-feedback">Please confirm your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" id="terms" required>
                                                <label class="form-check-label" for="terms">I agree and accept the <a href="{{route('terms.show')}}">Terms and Conditions</a> and <a href="{{route('policy.show')}}">Privacy Policy</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="flex items-center">


                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="{{route('login')}}">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->


@endsection
