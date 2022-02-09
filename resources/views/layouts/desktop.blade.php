<div class="side">
    <div class="side-content">
        <a href="{{ route('dashboard') }}">
            <div class="product @if(Request::segment(1) == 'dashboard') active @endif">Products</div>
        </a>
        <a href="{{ route('orders') }}">
            <div class="orders  @if(Request::segment(1) == 'orders') active @endif">Orders</div>
        </a>
        <a href="{{ route('earnings') }}">
            <div class="Earnings  @if(Request::segment(1) == 'earnings') active @endif">Earnings</div>
        </a>
        <a href="{{ route('user.settings') }}">
            <div class="settings  @if(Request::segment(1) == 'settings') active @endif">Settings</div>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-default create-event2" type="submit">Logout</button>
        </form>
    </div>

    
</div>