@extends('layouts.master')

@section('content')
<main class="container mx-auto px-6 sm:px-0">
    <div class=""></div>
    <div class="w-auto mt-12 lg:mt-0 sm:mx-9 lg:centered bg-ungupudar p-6 lg:w-2/6 text-putih text-xl my-login-form">
        <form action="{{ url('login') }}" method="post">
            @csrf
            <h1 class="font-black text-6xl tracking-widest mb-6">Login</h1>
            <div class="flex flex-col tracking-widest mb-6">
                <label for="email">Email</label>
                <input class="tracking-widest p-4 rounded-2xl text-base text-hitam mt-3" type="email" name="email" id="email" placeholder="Your email" autofocus>
            </div>
            <div class="flex flex-col tracking-widest mb-6">
                <label for="password">Password</label>
                <input class="tracking-widest p-4 rounded-2xl text-base text-hitam mt-3" type="password" name="password" id="password" placeholder="Your password">
            </div>
            <div class="flex gap-5 mt-9 mb-6">
                <button id="fb" class="grow bg-biru p-2 rounded-xl tracking-widest shadow-kuning">Facebook</button>
                <button id="google" class="grow bg-oren p-2 rounded-xl tracking-widest shadow-biru">Google</button>
            </div>
            @if (session()->has('error_messages'))
            <div class="mb-6 text-center bg-merah p-3 rounded-xl tracking-widest shadow-biru">{{ session()->get('error_messages') }}</div>
            @endif
            @if (session()->has('success'))
            <div class="mb-6 text-hitam text-center bg-hijau p-3 rounded-xl tracking-widest shadow-biru">{{ session()->get('success') }}</div>
            @endif
            <div class="flex mb-6">
                <button class="grow bg-ungu text-hitam p-3 rounded-xl tracking-widest shadow-biru" type="submit">LOGIN</button>
            </div>
        </form>
    </div>
</main>
@include('layouts.form_login')
@endsection