@extends('front.layout.template')

{{-- Menggunakan variabel yang lebih deskriptif untuk judul --}}
@section('title', 'Category '. $category)

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="mb-4">
            {{-- PERBAIKAN: Menghapus @csrf dari form dengan metode GET --}}
            <form action="{{ route('search') }}" method="get">
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Cari artikel..."/>
                    <button class="btn btn-primary" id="button-search" type="submit">Cari</button>
                </div>
            </form>
        </div>

        {{-- Menampilkan nama kategori yang sedang dilihat --}}
        <p>Menampilkan artikel dalam kategori: <b>{{ $category }}</b></p>
        <hr>

        <div class="row">
            @forelse ($articles as $item)
                {{-- Menggunakan grid yang lebih responsif --}}
                <div class="col-lg-4 col-md-6 mb-4">
                    <!-- Blog post-->
                    <div class="card mb-4 shadow-sm h-100">
                        <a href="{{ url('p/'.$item->slug) }}"><img class="card-img-top post-img" src="{{ asset('storage/back/'.$item->img) }}" alt="{{ $item->title }}" /></a>
                        <div class="card-body card-height">
                            <div class="small text-muted">
                                {{ $item->created_at->format('d-m-Y') }}
                                |
                                {{ $item->User->name }}
                                |
                                {{-- PERBAIKAN: Mengganti uri() menjadi url() --}}
                                <a href="{{ url('category/'.$item->Category->slug) }}">{{ $item->Category->name }}</a>
                            </div>
                            <h2 class="card-title h4">{{$item->title}}</h2>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($item->desc), 100,'...') }}
                            </p>
                            <a class="btn btn-primary" href="{{ url('p/'.$item->slug) }}">Baca Selengkapnya →</a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center">
                    <h3>Artikel Tidak Ditemukan</h3>
                    <p>Belum ada artikel yang dipublikasikan dalam kategori ini.</p>
                </div>
            @endforelse
        </div>
        
        {{-- Link paginasi --}}
        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
