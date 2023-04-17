@extends('layouts.master')

@section('content')
<main class="container mx-auto px-6 sm:px-0">
    <div class="w-auto mt-12 lg:mt-0 sm:mx-9 lg:centered bg-ungupudar p-6 lg:w-2/6 text-putih text-xl my-login-form">
        <form action="{{ url('register') }}" method="post">
            @csrf
            <h1 class="font-black text-4xl tracking-widest mb-3">Register</h1>
            <div class="flex flex-col tracking-widest mb-3">
                <label for="name">Name</label>
                <input class="tracking-widest p-4 rounded-2xl text-base text-hitam mt-3" type="name" name="name" id="name" placeholder="Your name" value="{{ old('name') }}" autofocus>
                @if ($errors->has('name'))
                <span class="mt-2 text-base text-hitam">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="flex flex-col tracking-widest mb-3">
                <label for="email">Email</label>
                <input class="tracking-widest p-4 rounded-2xl text-base text-hitam mt-3" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Your email">
                @if ($errors->has('email'))
                <span class="mt-2 text-base text-hitam">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="flex flex-col tracking-widest mb-3">
                <label for="password">Password</label>
                <input class="tracking-widest p-4 rounded-2xl text-base text-hitam mt-3" type="password" name="password" id="password" placeholder="Your password">
                @if ($errors->has('password'))
                <span class="mt-2 text-base text-hitam">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="flex flex-col tracking-widest mb-3">
                <label for="password_confirmation">Repeat password</label>
                <input class="tracking-widest p-4 rounded-2xl text-base text-hitam mt-3" type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat password">
            </div>
            <div class="flex gap-5 my-6">
                <button id="fb" class="grow bg-biru p-2 rounded-xl tracking-widest shadow-kuning">Facebook</button>
                <button id="google" class="grow bg-oren p-2 rounded-xl tracking-widest shadow-biru">Google</button>
            </div>
            @if (session()->has('error_messages'))
            <div class="mb-6 text-center bg-merah p-3 rounded-xl tracking-widest shadow-biru">{{ session()->get('error_messages') }}</div>
            @endif
            <div class="flex mb-6">
                <button class="grow bg-ungu text-hitam p-3 rounded-xl tracking-widest shadow-biru" type="submit">DAFTAR</button>
            </div>
        </form>
    </div>
</main>
@include('layouts.form_login')
@endsection