@extends('layouts.master')

@section('content')
<main class="container mx-auto px-6 sm:px-0">
    <div class="flex justify-center{{ (Auth::check()) ? ' sm:justify-start' : '' }}">
        @if (Auth::check())
        <a href="{{ url('blogs/create') }}" class="bg-ungupudar grow sm:grow-0 text-xl sm:text-3xl font-semibold text-pudar text-center px-9 py-4 my-12 max-w-md rounded-3xl">Create Blog +</a>
        @else
        <div class="bg-ungupudar grow sm:grow-0 text-xl sm:text-3xl font-semibold text-pudar text-center px-12 py-4 my-12 max-w-md rounded-3xl">Welcome To My Blog</div>
        @endif
    </div>
    @if (session()->has('login') || session()->has('create'))
    <div class="mb-12 text-hitam text-center bg-hijau p-3 rounded-xl tracking-widest shadow-normal">{{ session()->get('login') ? session()->get('login') : session()->get('create') }}</div>
    @elseif (session()->has('logout') || session()->get('delete'))
    <div class="mb-12 text-center bg-merah p-3 rounded-xl tracking-widest shadow-abu">{{ session()->get('logout') ? session()->get('logout') : session()->get('delete') }}</div>
    @endif
    <div class="grid sm:grid-cols-3 lg:grid-cols-5 gap-8 text-center justify-center">
        @foreach($blogs as $blog)
        <div class="rounded-3xl drop-shadow-md box-border max-w-sm">
            <a href="{{ url("blogs/{$blog->slug}") }}">
                @if ($blog->thumbnail)
                <img class="border-t border-l border-r border-pudarungu rounded-t-3xl h-60 sm:h-48 w-full" src="{{ asset("storage/{$blog->thumbnail}") }}" alt="{{ $blog->judul }}">
                @else
                <img class="border-t border-l border-r border-pudarungu rounded-t-3xl h-60 sm:h-48 w-full" src="{{ asset("storage/img/default.png") }}" alt="Default">
                @endif
                @if (!Auth::check())
                <div class="bg-ungu text-hitam py-3 px-6 border-b border-l border-r border-ungu rounded-b-3xl font-semibold truncate">
                    {{ $blog->judul }}
                </div>
                @endif
            </a>
            @if (Auth::check())
            <div class="flex border-b border-l border-r border-pudarungu rounded-b-3xl">
                <a class="grow bg-hijau py-3 px-6 rounded-bl-3xl" href="{{ url("blogs/{$blog->slug}/edit") }}"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                <form method="post" class="grow flex" action="{{ url("blogs/{$blog->slug}") }}">
                    @csrf
                    @method('delete')
                    <button class="grow bg-merah py-3 px-6 rounded-br-3xl" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?');"><i class="fa-solid fa-trash fa-lg"></i></button>
                </form>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    <div class="my-9 font-semibold">{{ $blogs->onEachSide(1)->links('pagination::tailwind') }}</div>
</main>
@endsection