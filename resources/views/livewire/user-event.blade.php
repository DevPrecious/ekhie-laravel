<div>
    <main>

        <div class="add-event">
            <div class="add-event-title">
                <h3>Add New Event</h3>
                <hr>
            </div>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <form>
                <label for="event-title">EVENT TITLE <span>(required)</span></label><br>
                <input type="text" wire:model="title" class="input"><br>
                @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <label for="event-description">EVENT DESCRIPTION <span>(required)</span></label><br>
                <textarea wire:model="description" id="" cols="30" rows="5"></textarea><br>
                @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <label for="event-timing">EVENT TIME & DATE</label><br>
                <div class="date">
                    <p>Start/End</p>
                    <input id="today" wire:model="start_date" type="date">
                    @error('start_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="time" wire:model="start_time">
                    @error('start_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    to <input type="time" wire:model="end_time">
                    @error('end_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="date" wire:model="end_date">
                    @error('end_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="import-file">
                    <label for="event-image">EVENT IMAGE</label><br>
                    <label class="file">
                        <input wire:model="event_image" type="file" id="file" aria-label="File browser">
                        <span class="file-custom"></span>
                    </label>
                    @error('event_image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="event-category">EVENT CATEGORY</label><br>
                <input type="text" class="input" wire:model="category"><br>
                @error('category')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="event-location">
                    <label for="event-location">EVENT LOCATION</label><br>
                    <input type="text" wire:model="location" placeholder="Location Name" class="input">
                    @error('location')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" wire:model="city" placeholder="City" class="input"><br>
                    @error('city')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" wire:model="state" placeholder="State" class="input">
                    @error('state')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" wire:model="country" placeholder="Country" class="input">
                    @error('country')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="event-organizer">EVENT ORGANIZER</label><br>
                <input type="text" class="input" wire:model="organizer"><br>
                @error('organizer')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <label for="event-website">EVENT WEBSITE <span>(url)</span></label><br>
                <input type="text" class="input" wire:model="url"><br>
                @error('url')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

                <!--ticket upload section-->
                <div class="ticket">
                    <div class="ticket-top">
                        <h3 class="intro">Event ticket offers</h3>
                        <button type="button" wire:click.prevent="add({{$i}})" class="btn btn-default add-btn">
                            add ticket
                        </button>
                    </div>
                    <div class="container tickets" id="duplicater">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="ticket-type">Ticket-type :</label><br>
                                <input type="text" class="input" wire:model="ticket_type.0"><br>
                                @error('ticket_type.0')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="amount">Amount :</label><br>
                                <input type="text" class="input" wire:model="ticket_amount.0"><br>
                                @error('ticket_amount.0')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="price">Price :</label><br>
                                <input type="text" class="input" wire:model="ticket_price.0"><br>
                                @error('ticket_price.0')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="price">Ticket Downloadable File</label><br>
                                <label class="file">
                                    <input type="file" id="file" wire:model="ticket_image.0" aria-label="File browser">
                                    <span class="file-custom"></span>
                                </label>
                                @error('ticket_image.0')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @foreach($inputs as $key => $value)
                        <div class="row">
                            <div class="col-md-3">
                                <label for="ticket-type">Ticket-type :</label><br>
                                <input type="text" class="input" wire:model="ticket_type.{{ $value }}" required><br>
                                @error('ticket_type.'.$value)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="amount">Amount :</label><br>
                                <input type="text" class="input" wire:model="ticket_amount.{{ $value }}"><br>
                                @error('ticket_amount.'.$value)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="price">Price :</label><br>
                                <input type="text" class="input" wire:model="ticket_price.{{ $value }}"><br>
                                @error('ticket_price.'.$value)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="price">Ticket Downloadable File</label><br>
                                <label class="file">
                                    <input type="file" id="file" wire:model="ticket_image.{{ $value }}" aria-label="File browser">
                                    <span class="file-custom"></span>
                                </label>
                                @error('ticket_image.'.$value)
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="button" wire:click.prevent="remove({{$key}})" class="btn btn-default add-btn">
                                    remove ticket
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- <div class="container tickets" id="duplicater">
                       
                    </div> -->

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-default submit" wire:click.prevent="store()">Submit your ticket for review</button>
                </div>
            </form>
        </div>

    </main>
</div>