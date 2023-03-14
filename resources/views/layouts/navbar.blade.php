<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">ARKAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('/*')) ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
            </li>
           <li class="nav-item">
                <a class="nav-link {{ (request()->is('activities*')) ? 'active' : '' }}" aria-current="page" href="{{ route('activities.index') }}">Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('items*')) ? 'active' : '' }}" aria-current="page" href="{{ route('items.index') }}">Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('transactions*')) ? 'active' : '' }}" aria-current="page" href="{{ route('transactions.index') }}">Transaksi</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
</nav>