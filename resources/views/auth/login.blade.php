@extends('layouts.login')

@section('content')
                    
    <form method="POST" action="{{ route('login') }}" class="md-float-material form-material">
        <div class="text-center">
            <img src="public/img/logoT2.png" alt="logo.png">
        </div>
        @csrf
        <div class="auth-box card">
            <div class="card-block">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-center">Iniciar sesion MRO</h3>
                    </div>
                </div>
                <div class="mb-3 form-primary">
                    <input id="email" type="text" 
                    class="form-control @error('email') is-invalid @enderror" 
                    name="email" value="{{ old('email') }}" 
                    required autocomplete="email" autofocus placeholder="Usuario">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3 form-primary">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contrasena">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row m-t-25 text-start">
                    <div class="col-12">
                        <div class="checkbox-fade fade-in-primary d-">
                            <label class="form-label">
                                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="cr"><i
                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                <span class="text-inverse">{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <div class="forgot-phone text-end f-right">
                                <a class="text-end f-w-600" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row m-t-30">
                    <div class="col-md-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-md waves-effect waves-light text-center m-b-20">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </form>
@endsection


