<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">SPP</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ url()->current() == url('/') ? 'active' : '' }}">
                <a href="{{ url('') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title">Dashboard</span>
                </a>                    
            </li>

            {{-- NAVIGATION --}}            
            <li class=" navigation-header"><span>Pembayaran</span></li>
            
            <li class="nav-item {{ url()->current() == url('admin/pembayaran-spp') ? 'active' : '' }}">
                <a href="{{ route('admin.pembayaran-spp') }}">
                    <i class="feather icon-book"></i>
                    <span class="menu-title">Pembayaran SPP</span>
                </a>            
            </li>                               
        </ul>
    </div>
</div>