<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEvent extends Component
{
    use WithFileUploads;
    public $title, $description, $start_date, $start_time, $end_date, $end_time, $event_image, $category, $location, $city, $state, $country, $organizer, $url
    , $ticket_type, $ticket_amount, $ticket_price, $ticket_image;
    public $inputs = [];
    public $updateMode = false;
    public $i = 1;

    public function add($i){
       $i = $i + 1;
       $this->i = $i;
       array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->start_date = '';
        $this->start_time = '';
        $this->end_date = '';
        $this->end_time = '';
        $this->event_image = '';
        $this->category = '';
        $this->location = '';
        $this->city = '';
        $this->state = '';
        $this->country = '';
        $this->organizer = '';
        $this->url = '';
        $this->ticket_type = '';
        $this->ticket_amount = '';
        $this->ticket_price = '';
        $this->ticket_image = '';

    }

    public function render()
    {
        return view('livewire.user-event');
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'start_time' => 'required',
                'end_date' => 'required',
                'end_time' => 'required',
                'event_image' => 'required',
                'category' => 'required',
                'location' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'organizer' => 'required',
                'url' => 'required|url',
                'ticket_type.0' => 'required',
                'ticket_amount.0' => 'required',
                'ticket_price.0' => 'required',
                'ticket_image.0' => 'required',
                // 'ticket_type.*' => 'required',
                // 'ticket_amount.*' => 'required',
                // 'ticket_price.*' => 'required',
                // 'ticket_image.*' => 'required',
            ],
            [
                'ticket_type.0.required' => 'Ticket Title field is required',
                'ticket_amount.0.required' => 'Ticket Amount field is required',
                'ticket_price.0.required' => 'Ticket Price field is required',
                'ticket_image.0.required' => 'Ticket Image field is required',
                // 'ticket_type.*.required' => 'Ticket Title field is required',
                // 'ticket_amount.*.required' => 'Ticket Amount field is required',
                // 'ticket_price.*.required' => 'Ticket Price field is required',
                // 'ticket_image.*.required' => 'Ticket Image field is required',
            ]
        );

        $eventimage = $this->event_image->store('events', 'public');

        $event = new Event();
        $event->title = $this->title;
        $event->description = $this->description;
        $event->start_date = $this->start_date;
        $event->start_time = $this->start_time;
        $event->end_date = $this->end_date;
        $event->end_time = $this->end_time;
        $event->event_image = $eventimage;
        $event->category = $this->category;
        $event->location = $this->location;
        $event->city = $this->city;
        $event->state = $this->state;
        $event->country = $this->country;
        $event->organizer = $this->organizer;
        $event->url = $this->url;
        $event->user_id = auth()->id();
        $event->save();

        $eventID = $event->id;

        foreach ($this->ticket_type as $key => $value) {
            $ticketimage = $this->ticket_image[$key]->store('ticket', 'public');
            Ticket::create([
                'event_id' => $eventID,
                'ticket_type' => $this->ticket_type[$key],
                'ticket_amount' => $this->ticket_amount[$key],
                'ticket_price' => $this->ticket_price[$key],
                'ticket_file' => $ticketimage,
            ]);
        }


        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Event Created Successfully.');
        
        
    }
}
