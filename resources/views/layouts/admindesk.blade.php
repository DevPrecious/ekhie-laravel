<div class="side">
    <div class="side-content">
      <a href="{{ route('admin.home') }}"
        ><div class="event-review @if(Request::segment(2) == 'dashboard') active @endif">Event Review</div></a
      >
      <a href="{{ route('events') }}"
        ><div class="events @if(Request::segment(2) == 'events') active @endif">All Events</div></a
      >
      <a href="{{ route('admin.organizers') }}"
        ><div class="Organisers @if(Request::segment(2) == 'organizers') active @endif">Organisers</div></a
      >
      <a href="{{ route('create') }}"
        ><div class="create-event">Create Event</div></a
      >
      <a href="{{ route('admin.products') }}"
        ><div class="my-products @if(Request::segment(2) == 'products') active @endif">My Products</div></a
      >
      <a href="{{ route('admin.orders') }}"><div class="all-orders @if(Request::segment(2) == 'orders') active @endif">All Orders</div></a>
      <a href="{{ route('admin.shop') }}"><div class="all-orders @if(Request::segment(2) == 'shop') active @endif">Shop</div></a>
      <a href="{{ route('admin.earnings') }}"
        ><div class="my-earnings @if(Request::segment(2) == 'earnings') active @endif">My Earnings</div></a
      >
      <a href="{{ route('admin.settings') }}"
        ><div class="my-settings @if(Request::segment(2) == 'settings') active @endif">Settings</div></a
      >
        <form action="{{ route('logout') }}" method="post">
          @csrf
            <button class="btn active">Logout</button>
        </form>
    </div>
  </div>