@extends('backend.auth.main')

@section('auth-title')
    Login
@endsection

@section('auth-content')
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                Sign In
            </h2>
            <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
            @include('backend.layouts.partials.alerts')
            <form method="POST" action="{{ route('dashboard.login.submit') }}">
                @csrf
                <div class="intro-x mt-8">
                    <input type="email" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" id="email" name="email" :value="old('email')" required autofocus />

                    <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" id="password" name="password"
                    required autocomplete="current-password" />

                </div>
                <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                    <div class="flex items-center mr-auto">
                        <input type="checkbox" class="input border mr-2" id="remember-me">
                        <label class="cursor-pointer select-none" for="remember-me" name="remember">{{ __('Remember me') }}</label>
                    </div>
                    <a href="">Forgot Password?</a> 
                </div>
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Login</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection