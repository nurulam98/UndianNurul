<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>

            <li class="nav-item">
                <a href="{{ route('home')}}" class="nav-link {{ (\Request::route()->getName() == 'home') ? 'active' : ''}}">
                    <i class="icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hadiah') }}" class="nav-link {{ (\Request::route()->getName() == 'hadiah') ? 'active' : ''}} ">
                    <i class="icon icon-cloud-upload"></i> Hadiah
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('exportPeserta') }}" class="nav-link {{ (\Request::route()->getName() == 'exportPeserta') ? 'active' : ''}}">
                    <i class="icon icon-notebook"></i> Export Data Pemenang
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('importPeserta') }}" class="nav-link {{ (\Request::route()->getName() == 'importPeserta') ? 'active' : ''}} ">
                    <i class="icon icon-cloud-upload"></i> Import Peserta
                </a>
            </li>



        </ul>
    </nav>
</div>
