<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <x-side-nav.link :url="route('panel.dashboard')"
                             :text="__('Dashboard')"
                             icon="fas fa-house"/>

            <x-side-nav.link :url="route('panel.exchanges.create')"
                             :text="__('Create Exchanges')"
                             icon="fas fa-plus"/>
        </div>
    </div>

    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">{{ __('Logged in as:') }}</div>
            <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
        </div>
    </div>
</nav>
