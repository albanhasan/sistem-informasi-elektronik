
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                        <a href="{{route("dashboard")}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                <li class="menu-title">Electronics</li><!-- /.menu-title -->
                <li>
                    <a href="{{ route("/electronic/list")}}"> <i class="menu-icon fa fa-bars"></i>Daftar Electronic</a>
                </li>
                @if (auth()->user()->isAdmin)
                    <li class="menu-title">Category</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route("category.index")}}"> <i class="menu-icon fa fa-bars"></i>Lihat Category </a>
                    </li>
                    <li>
                        <a href="{{ route("category.create")}}"> <i class="menu-icon fa fa-spinner"></i>Tambah Category </a>
                    </li>

                    <li class="menu-title">Electronic</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route("electronic.index")}}"> <i class="menu-icon fa fa-bars"></i>Lihat Electronic </a>
                    </li>
                    <li>
                        <a href="{{ route("electronic.create")}}"> <i class="menu-icon fa fa-spinner"></i>Tambah Electronic </a>
                    </li>

                    <li class="menu-title text-uppercase">Transaksi</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route("transactions.index")}}"> <i class="menu-icon fa fa-bars"></i>Lihat Transaksi </a>
                    </li>
                @endif

               
                {{-- <li>
                    <a href="{{ route("transactions.create")}}"> <i class="menu-icon fa fa-spinner"></i>Tambah Transaksi </a>
                </li> --}}

        </div><!-- /.navbar-collapse -->
    </nav>
</aside>