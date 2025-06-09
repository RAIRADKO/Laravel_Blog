<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            {{-- OPSI BARU: Link untuk kembali ke halaman utama --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <span data-feather="external-link" class="align-text-bottom"></span>
                    Back to Home
                </a>
            </li>
        </ul>

        {{-- Menambahkan heading untuk memisahkan menu utama dan manajemen --}}
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Management</span>
        </h6>

        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('article') }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Articles
                </a>
            </li>
            @if(auth()->user()->role == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('categories') }}">
                        <span data-feather="tag" class="align-text-bottom"></span>
                        Categories
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('users') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
        </ul>

        {{-- Menu untuk Logout di bagian bawah --}}
        <ul class="nav flex-column mb-2 pt-3 border-top">
             <li class="nav-item">
                {{-- Form Logout yang tersembunyi --}}
                <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                {{-- Link Logout yang akan men-submit form --}}
                <a class="nav-link" href="{{ route('logout') }}" 
                   onclick="event.preventDefault();
                            document.getElementById('logout-form-sidebar').submit();">
                    <span data-feather="log-out" class="align-text-bottom"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>