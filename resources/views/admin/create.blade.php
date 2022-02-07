@extends('layouts.admin')
@section('content')


<main>
    <div class="board">
        <div class="side">
            <div class="side-content">
                <a href="adeventreview.html">
                    <div class="event-review">Event Review</div>
                </a>
                <a href="adevents.html">
                    <div class="events">All Events</div>
                </a>
                <a href="adorganisers.html">
                    <div class="Organisers">Organisers</div>
                </a>
                <a href="adcreateevent.html">
                    <div class="create-event active">Create Event</div>
                </a>
                <a href="admyproducts.html">
                    <div class="my-products">My Products</div>
                </a>
                <a href="adorders.html">
                    <div class="all-orders">All Orders</div>
                </a>
                <a href="adearnings.html">
                    <div class="my-earnings">My Earnings</div>
                </a>
                <a href="adsettings.html">
                    <div class="my-settings">Settings</div>
                </a>
                <a href="#">
                    <div class="logout">Logout</div>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="add-event">
                <div class="add-event-title">
                    <h3>Add New Event</h3>
                    <hr />
                </div>
                <form>
                    <label for="event-title">EVENT TITLE <span>(required)</span></label><br />
                    <input type="text" class="input" /><br />
                    <label for="event-description">EVENT DESCRIPTION <span>(required)</span></label><br />
                    <textarea name="event-desc" id="" cols="30" rows="5"></textarea><br />
                    <label for="event-timing">EVENT TIME & DATE</label><br />
                    <div class="date">
                        <p>Start/End</p>
                        <input id="today" type="date" /><input type="time" /> to
                        <input type="time" /><input type="date" />
                    </div>
                    <div class="import-file">
                        <label for="event-image">EVENT IMAGE</label><br />
                        <label class="file">
                            <input type="file" id="file" aria-label="File browser" />
                            <span class="file-custom"></span>
                        </label>
                    </div>
                    <label for="event-category">EVENT CATEGORY</label><br />
                    <input type="text" class="input" /><br />
                    <div class="event-location">
                        <label for="event-location">EVENT LOCATION</label><br />
                        <input type="text" placeholder="Location Name" class="input" />
                        <input type="text" placeholder="City" class="input" /><br />
                        <input type="text" placeholder="State" class="input" />
                        <input type="text" placeholder="Country" class="input" />
                    </div>
                    <label for="event-organizer">EVENT ORGANIZER</label><br />
                    <input type="text" class="input" /><br />
                    <label for="event-website">EVENT WEBSITE <span>(url)</span></label><br />
                    <input type="text" class="input" /><br />

                    <!--ticket upload section-->
                    <div class="ticket">
                        <div class="ticket-top">
                            <h3 class="intro">Event ticket offers</h3>
                            <input type="button" class="btn btn-default add-btn" value="add ticket" id="button" onclick="duplicate()" />
                        </div>
                        <div class="container tickets" id="duplicater">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ticket-type">Ticket-type :</label><br />
                                    <input type="text" class="input" /><br />
                                </div>
                                <div class="col-md-3">
                                    <label for="amount">Amount :</label><br />
                                    <input type="text" class="input" /><br />
                                </div>
                                <div class="col-md-3">
                                    <label for="price">Price :</label><br />
                                    <input type="text" class="input" /><br />
                                </div>
                                <div class="col-md-3">
                                    <label for="price">Ticket Downloadable File</label><br />
                                    <label class="file">
                                        <input type="file" id="file" aria-label="File browser" />
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-default submit">
                            Submit your ticket for review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection