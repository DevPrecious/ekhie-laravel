<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class Ticketbutton extends Component
{
    public $tickets;
    public $price;
    public $todrop = 0;
    public $type;
    public $in_price;

    // public function mount($ticket)
    // {
    //     $this->ticket = $ticket;
    //     $this->price = $ticket->ticket_price;
    // }

    public function mount()
    {
        $e_id = request()->route('id');
        $this->tickets  = Ticket::where('event_id', $e_id)->get();
    }

    public function increment($id)
    {
        $getini = Ticket::find($id);
        if ($getini->id == $id) {
            $this->price = (int)$getini->ticket_price + (int)$this->price;
            $this->todrop = $this->price;
        }
    }

    public function decrement($id)
    {
        $getini = Ticket::find($id);
        $this->price = (int)$this->price - (int)$getini->ticket_price;
        $this->todrop = $this->price;
        if ($this->price == 0) {
            $this->price = 0;
        }
    }

    public function render()
    {
        return view('livewire.ticketbutton');
    }

    public function store()
    {
        dd('yes');
    }
}
