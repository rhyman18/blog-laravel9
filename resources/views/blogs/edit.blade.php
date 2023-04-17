@extends('layouts.master')

@section('content')
<main class="container mx-auto px-6 sm:px-0">
    <div class="w-auto mt-12 lg:mt-0 lg:centered bg-pudar p-5 lg:w-2/4 border drop-shadow-lg rounded-3xl">
        <form action="{{ url("blogs/{$blog->id}") }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if ($errors->has('judul'))
            <span class="text-base text-hitam">{{ $errors->first('judul') }}</span>
            @endif
            <input class="bg-pudarungu border w-full rounded-2xl p-4 mb-3 focus:shadow-lg" type="text" name="judul" id="judul" placeholder="Judul Artikel" value="{{ old('judul', $blog->judul) }}" autofocus>
            <div class="flex flex-wrap gap-1">
                @if ($errors->has('thumbnail'))
                <span class="text-base text-hitam">{{ $errors->first('thumbnail') }}</span>
                @endif
                @if ($errors->has('banner'))
                <span class="text-base text-hitam">{{ $errors->first('banner') }}</span>
                @endif
            </div>
            <div class="flex flex-col lg:flex-row gap-3 mb-3">
                <input class="inputfile" type="file" name="thumbnail" id="thumbnail">
                <label class="bg-pudarungu grow border rounded-2xl p-4 cursor-pointer" for="thumbnail" id="labelThumbnail">Upload Thumbnail</label>
                <input class="inputfile" type="file" name="banner" id="banner">
                <label class="bg-pudarungu grow border rounded-2xl p-4 cursor-pointer" for="banner" id="labelBanner">Upload Banner</label>
            </div>
            @if ($errors->has('konten'))
            <span class="text-base text-hitam">{{ $errors->first('konten') }}</span>
            @endif
            <input id="editor" type="hidden" name="konten" value="{{ old('konten', $blog->konten) }}">
            <trix-editor input="editor" class="bg-pudarungu h-80 overflow-y-scroll border rounded-2xl px-6 p-4 mb-3 focus:shadow-lg" placeholder="Konten Artikel"></trix-editor>
            <div class="flex justify-end gap-3 px-6">
                <button class="my-btn bg-hijau rounded-2xl w-20 py-2" type="submit">Save</button>
                <button class="my-btn bg-merah rounded-2xl w-20 py-2" id="clear">Clear</button>
            </div>
        </form>
    </div>
</main>
@include('layouts.form_blogs')
@endsection