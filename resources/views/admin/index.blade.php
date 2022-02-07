@extends('layouts.admin')
@section('content')

<main class="review-main">
      <div class="board">
        <div class="side">
          <div class="side-content">
            <a href="adeventreview.html"
              ><div class="event-review active">Event Review</div></a
            >
            <a href="adevents.html"><div class="events">All Events</div></a>
            <a href="adorganisers.html"
              ><div class="Organisers">Organisers</div></a
            >
            <a href="adcreateevent.html"
              ><div class="create-event">Create Event</div></a
            >
            <a href="admyproducts.html"
              ><div class="my-products">My Products</div></a
            >
            <a href="adorders.html"><div class="all-orders">All Orders</div></a>
            <a href="adearnings.html"
              ><div class="my-earnings">My Earnings</div></a
            >
            <a href="adsettings.html"
              ><div class="my-settings">Settings</div></a
            >
            <a href="#"><div class="logout">Logout</div></a>
          </div>
        </div>
        <div class="content ctn review-content">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Event Name</th>
                <th scope="col">Price</th>
                <th scope="col">Organizer</th>
                <th scope="col">View</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Holiday splash</td>
                <td>#30,000</td>
                <td>Davies Ben</td>
                <td>
                  <button class="btn btn-default view-btn">Event</button>
                </td>
                <td>
                  <button class="btn btn-default view-btn2">
                    <i class="fas fa-check"></i>
                  </button>
                  <button class="btn btn-default view-btn3">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Music concert</td>
                <td>#5,000</td>
                <td>Thorton music</td>
                <td>
                  <button class="btn btn-default view-btn">Event</button>
                </td>
                <td>
                  <button class="btn btn-default view-btn2">
                    <i class="fas fa-check"></i>
                  </button>
                  <button class="btn btn-default view-btn3">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry night party</td>
                <td>#12,000</td>
                <td>Tv organizer</td>
                <td>
                  <button class="btn btn-default view-btn">Event</button>
                </td>
                <td>
                  <button class="btn btn-default view-btn2">
                    <i class="fas fa-check"></i>
                  </button>
                  <button class="btn btn-default view-btn3">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>


      </div>
    </main>

@endsection