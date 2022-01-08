@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row flex-justify-center">
        <div class="cell-5">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <br>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="cell-4 p-3">
                                <div class="text-center">Username</div>
                            </div>
                            <div class="cell-7"><input type="text" name="username" id="username"
                                    value="{{ old('username') }}" data-role="input"></div>
                        </div>
                        <div class="row">
                            <div class="cell-12">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="cell-4 p-3">
                                <div class="text-center">Password</div>
                            </div>
                            <div class="cell-7"><input type="password" name="password" id="password"
                                    value="{{ old('password') }}" data-role="input"></div>
                        </div>
                        <div class="row">
                            <div class="cell-12">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell-4 p-3"></div>
                            <div class="cell-3">
                                <button type="submit" class="button success">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="cell-4 p-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>
</div>
@endsection