@extends('front.layout.template')

@section('title', 'PostinAJA')

@section('content')
    <div class="container">
        <div class="mb-4"> {{-- Memberi sedikit lebih banyak ruang di bawah form --}}
            <form action="{{ route('search') }}" method="GET">
                {{-- @csrf tidak diperlukan untuk form dengan method GET --}}
                <div class="input-group">
                    <input class="form-control" type="search" name="keyword" placeholder="Cari artikel..." value="{{ $keyword ?? '' }}" aria-label="Search articles">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>

        @if (isset($keyword) && !empty($keyword))
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="mb-0">Menampilkan hasil untuk: <b>{{ $keyword }}</b></p>
                <a href="{{ url('articles') }}" class="btn btn-outline-secondary btn-sm">Reset Pencarian</a>
            </div>
        @endif

        <div class="row">
            @forelse ($articles as $item)
                <div class="col-md-6 col-lg-4 mb-4"> {{-- Membuatnya lebih responsif --}}
                    <div class="card h-100 shadow-sm">
                        <a href="{{ url('p/' . $item->slug) }}">
                            <img class="card-img-top post-img" src="{{ asset('storage/back/' . $item->img) }}" alt="{{ $item->title }}">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <div class="small text-muted mb-2">
                                <span>{{ $item->created_at->format('d M Y') }}</span>
                                |
                                {{-- Pastikan relasi Category ada sebelum mengakses propertinya --}}
                                @if ($item->Category)
                                    <a href="{{ url('category/' . $item->Category->slug) }}">{{ $item->Category->name }}</a>
                                @endif
                            </div>
                            <h2 class="card-title h4">{{ $item->title }}</h2>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($item->desc), 150, '...') }}
                            </p>
                            <a class="btn btn-primary mt-auto align-self-start" href="{{ url('p/' . $item->slug) }}">Baca Selengkapnya →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-warning">
                        <h3>Artikel Tidak Ditemukan</h3>
                        <p>Maaf, tidak ada artikel yang cocok dengan pencarian Anda.</p>
                        @if (isset($keyword) && !empty($keyword))
                            <a href="{{ url('articles') }}" class="btn btn-primary mt-2">Lihat Semua Artikel</a>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{-- Menambahkan parameter pencarian ke link pagination --}}
            {{ $articles->appends(['keyword' => $keyword ?? ''])->links() }}
        </div>
    </div>
@endsection