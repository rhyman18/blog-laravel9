@extends('layouts.master')

@section('content')
<main>
    @if ($blog->banner)
    @php($banner = 'background: url(' . asset("storage/{$blog->banner}") . ') no-repeat center')
    @else
    @php($banner = 'background: url(' . asset("storage/img/default_banner.jpg") . ') no-repeat center')
    @endif
    <div class="h-72 bg-pudarungu overflow-hidden" style="{{ $banner }}"></div>
    <div class="container flex flex-col lg:flex-row mx-auto my-6 px-9 sm:px-0 gap-6 text-hitampudar">
        <article class="flex-1 font-semibold lg:me-12">
            @if (session()->has('edit'))
            <div class="my-9 text-hitam text-center bg-hijau p-3 rounded-xl tracking-widest shadow-normal">{{ session()->get('edit') }}</div>
            @endif
            <div class="flex flex-wrap gap-3 mt-9">
                <span class="bg-ungupudar font-medium px-5 py-1 rounded-3xl text-pudar"><i class="fa-solid fa-user me-1"></i>{{ $blog->pembuat }}</span>
                <span class="bg-ungupudar font-medium px-5 py-1 rounded-3xl text-pudar grow-0"><i class="fa-regular fa-clock me-1"></i>{{ date("d M Y H:i", strtotime($blog->updated_at)) }}</span>
            </div>
            <div class="text-3xl mt-6 text-ungu">{{ $blog->judul }}</div>
            <div class="mt-6 leading-loose">{!! $blog->konten !!}</div>
            <div class="mt-9 hover:text-ungu"><a href="{{ asset('/') }}"><i class="fa-solid fa-house me-1"></i>Kembali</a></div>
            @if ($totalComments > 0)
            <div class="container mt-16">
                <div class="text-3xl mt-6">{{ $totalComments }} Komentar</div>
                <div class="bg-ungu h-1 mt-4"></div>
                <div class="flex flex-col gap-5 mt-6">
                    @foreach ($comments as $comment)
                    <div class="border {{ ($loop->odd) ? 'bg-putih border-pudarungu' : 'bg-pudar border-ungu' }} p-5 rounded-3xl drop-shadow">
                        <p>{{ $comment->konten }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </article>
        <aside class="flex-initial lg:w-80 font-medium">
            <div class="mt-9">
                <h1 class="text-xl tracking-widest">Recent Article</h1>
            </div>
            <div class="bg-ungu h-1 mt-1"></div>
            <div class="flex-col mt-4">
                @foreach($recent as $blogs)
                <a href="{{ url("blogs/{$blogs->slug}") }}">
                    <div class="flex flex-col sm:flex-row bg-putih border border-2 border-pudarungu lg:h-28 mb-6 lg:mb-1.5 hover:drop-shadow">
                        <div class="flex flex-initial sm:w-2/5 lg:w-24 bg-hitam items-center justify-center overflow-hidden">
                            @if ($blogs->thumbnail)
                            <img src="{{ asset("storage/{$blogs->thumbnail}") }}" alt="{{ $blog->judul }}">
                            @else
                            <img src="{{ asset("storage/img/default.png") }}" alt="Default">
                            @endif
                        </div>
                        <div class="flex-1 p-6 lg:p-3">
                            <h1 class="font-semibold lg:font-medium elipsis-1">{{ $blogs->judul }}</h1>
                            <p class="mt-2 lg:mt-1 text-sm lg:text-xs font-extralight elipsis-6 lg:elipsis-3">{{ substr(strip_tags($blogs->konten), 0, 500) }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </aside>
    </div>
</main>
@endsection