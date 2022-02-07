<div class="side">
    <div class="side-content">
        <a href="udproduct.html">
            <div class="product active">Products</div>
        </a>
        <a href="udorders.html">
            <div class="orders">Orders</div>
        </a>
        <a href="udearnings.html">
            <div class="Earnings">Earnings</div>
        </a>
        <a href="{{ route('user.settings') }}">
            <div class="settings">Settings</div>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-default create-event2" type="submit">Logout</button>
        </form>
    </div>

    
</div>