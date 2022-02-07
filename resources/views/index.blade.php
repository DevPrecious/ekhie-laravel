@extends('layouts.app')
@section('content')
<main>


    <!--top image slider-->
    <div class="slider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/details.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/holiday.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
    <!--slider ends here-->
    <!--search section starts here-->
    <div class="search-box container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control" placeholder="Find Events near you">
                    <button class="btn btn-default search-btn">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!--search box ends here-->

    <!--upcoming events-->

    <div class="events">
        <h2 class="text-center">Trending <span class="special">Events</span></h2>
        <div class="line"></div>

        <div class="event-cards">
            <div class="container">
                <div class="row content">

                    @foreach($events as $event)
                    <div class="col-md-6">
                        <div class="card mb-3 content-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="content-image">
                                        <img src="/storage/{{ $event->event_image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->title }}</h5>
                                        <div class="card-text content-info">
                                            <div class="date">
                                                <i class="far fa-calendar-alt"></i> 
                                                {{ \Carbon\Carbon::parse($event->start_date)->diffForHumans() }}
                                            </div>
                                            <div class="price">
                                                <i class="fas fa-tag"></i> ₦15,000
                                            </div>
                                        </div>
                                        <div class="action">
                                            <div class="buy">
                                                <a href="{{ route('event', $event->id) }}" class="btn btn-primary">Buy Ticket</a>
                                                <div class="share"><i class="fas fa-share-alt"></i>share</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!--submit event details-->
    <div class="submit-notif">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="hosted">Events Hosted</h3>
                    <div class="line2"></div>
                    <p class="numbers">200</p>
                </div>
                <div class="col-md-4">
                    <h3 class="sold">Tickets Sold</h3>
                    <div class="line2"></div>
                    <p class="numbers">343</p>
                </div>
                <div class="col-md-4">
                    <h3 class="partners">Partners</h3>
                    <div class="line2"></div>
                    <p class="numbers">12</p>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection