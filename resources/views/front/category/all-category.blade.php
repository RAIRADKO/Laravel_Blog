@extends('front.layout.template')

@section('title', 'All Category ')

@section('content')
    <!-- Page content-->
        <div class="container">
            <p>Showing all category :</p>
            <div class="row">
                @foreach ($category as $item)
                    <div class="col-lg-3 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="{{ url('category/' . $item->slug) }}" class="text-dark text-decoration-none">
                                        <span>
                                            <a href="{{ url('category/'.$item->slug) }}" class="text-decoration-none text-dark">
                                                <i class="fas fa-folder fa-5x"></i>
                                            </a>
                                        </span>
                                        <h5 class="card-title mt-2">
                                            <a href="{{ url('category/'.$item->slug) }}" class="text-decoration-none text-dark">
                                                {{ $item->name }} ({{ $item->articles_count }})
                                            </a>
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- {{ $articles->links() }} --}}
        </div>
@endsection