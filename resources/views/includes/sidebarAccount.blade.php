{{-- Modern Account Sidebar Partial --}}
{{-- Usage: @include('includes.sidebarAccount') --}}
<div class="col-12 col-md-3 mb-4">
    <div class="acct-sidebar">
        {{-- Profile Header --}}
        <div class="acct-sidebar__header">
            <div class="acct-avatar">
                {{ strtoupper(substr(auth()->user()->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr(auth()->user()->last_name ?? '', 0, 1)) }}
            </div>
            <div class="acct-sidebar__info">
                <p class="acct-sidebar__name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                <p class="acct-sidebar__email">{{ auth()->user()->email }}</p>
            </div>
        </div>

        {{-- Nav Links --}}
        <nav class="acct-sidebar__nav">
            <a href="{{ route('users.account.index') }}"
               class="acct-nav-item {{ request()->is('accounts/index') ? 'active' : '' }}">
                <i class="fa-solid fa-house-user"></i>
                <span>My Account</span>
            </a>
            <a href="{{ route('users.orderList') }}"
               class="acct-nav-item {{ request()->is('account/orders') ? 'active' : '' }}">
                <i class="fa-solid fa-box"></i>
                <span>My Orders</span>
            </a>
            <a href="{{ route('users.account.address') }}"
               class="acct-nav-item {{ request()->is('account/address') ? 'active' : '' }}">
                <i class="fa-solid fa-map-location-dot"></i>
                <span>Address Book</span>
            </a>
            <a href="{{ route('users.recent.views') }}"
               class="acct-nav-item {{ request()->is('account/recent/products') ? 'active' : '' }}">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Recently Viewed</span>
            </a>
            <a href="{{ route('users.order.payments') }}"
               class="acct-nav-item {{ request()->is('account/order/payments') ? 'active' : '' }}">
                <i class="fa-solid fa-credit-card"></i>
                <span>Payments</span>
            </a>
            <a href="{{ route('users.account.settings') }}"
               class="acct-nav-item {{ request()->is('accounts/settings') ? 'active' : '' }}">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
            </a>
            <div class="acct-sidebar__divider"></div>
            <a href="{{ route('logout') }}" class="acct-nav-item acct-nav-item--logout"
               onclick="event.preventDefault(); document.getElementById('acct-logout-form').submit()">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Sign Out</span>
            </a>
            <form id="acct-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </nav>
    </div>
</div>

<style>
:root {
    --acct-primary: #0c4a6e;
    --acct-primary-l: #0369a1;
    --acct-accent: #f59e0b;
    --acct-surface: #f8fafc;
    --acct-line: #e2e8f0;
    --acct-text: #0f172a;
    --acct-muted: #64748b;
    --acct-r: 14px;
    --acct-shadow: 0 1px 3px rgba(0,0,0,.08), 0 4px 12px rgba(0,0,0,.05);
}
.acct-sidebar {
    background: #fff;
    border-radius: var(--acct-r);
    box-shadow: var(--acct-shadow);
    overflow: hidden;
    position: sticky;
    top: 90px;
}
.acct-sidebar__header {
    background: linear-gradient(135deg, var(--acct-primary) 0%, var(--acct-primary-l) 100%);
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: .875rem;
}
.acct-avatar {
    width: 48px; height: 48px;
    border-radius: 50%;
    background: rgba(255,255,255,.2);
    border: 2px solid rgba(255,255,255,.4);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; font-weight: 700; color: #fff;
    flex-shrink: 0;
}
.acct-sidebar__info { min-width: 0; }
.acct-sidebar__name {
    color: #fff; font-weight: 600; font-size: .9rem;
    margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.acct-sidebar__email {
    color: rgba(255,255,255,.7); font-size: .75rem;
    margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.acct-sidebar__nav { padding: .5rem 0; }
.acct-nav-item {
    display: flex; align-items: center; gap: .75rem;
    padding: .75rem 1.25rem;
    color: #334155; font-size: .875rem; font-weight: 500;
    text-decoration: none; transition: all .2s;
    border-left: 3px solid transparent;
}
.acct-nav-item i { width: 18px; text-align: center; font-size: .9rem; color: var(--acct-muted); flex-shrink:0; }
.acct-nav-item:hover { background: var(--acct-surface); color: var(--acct-primary); }
.acct-nav-item:hover i { color: var(--acct-primary); }
.acct-nav-item.active {
    background: #eff6ff;
    color: var(--acct-primary);
    border-left-color: var(--acct-primary);
    font-weight: 600;
}
.acct-nav-item.active i { color: var(--acct-primary); }
.acct-nav-item--logout { color: #ef4444; }
.acct-nav-item--logout i { color: #ef4444; }
.acct-nav-item--logout:hover { background: #fef2f2; color: #dc2626; }
.acct-sidebar__divider { height: 1px; background: var(--acct-line); margin: .5rem 1.25rem; }
</style>
