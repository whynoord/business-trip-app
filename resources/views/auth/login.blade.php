@extends('layouts.login')

@section('content')
    <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card pb-5 pt-3">
    
                    <div class="card-body text-center d-flex justify-content-center">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-9">
                                    <img src="/img/logo.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
    
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-9">
                                    <input  id="email" type="email" class="form-control bg-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-9">
                                    <input  id="password" type="password" class="form-control bg-light @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            {{-- <div class="row mb-3">
                                <div class="col-9-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
    
                            <div class="row mb-0 d-flex justify-content-center">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-primary" >
                                        {{ __('Log in') }}
                                    </button>
                                </div>
                            </div>
    
                            {{-- <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                            {{ __('Lupa password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
