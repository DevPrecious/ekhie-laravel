<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Buttonticket extends Component
{
    public $ticket;


    public function mount($ticket)
    {
        dd($this->ticket = $ticket);
        // $this->price = $ticket->ticket_price;
    }

    public function increment()
    {
        $this->price = $this->ticket->ticket_price + $this->price;
        $this->todrop = $this->price;
        $this->emitUp('clicked_on', $this->price);
    }

    public function decrement()
    {
        $this->price = $this->price - $this->ticket->ticket_price;
        $this->todrop = $this->price;
        if ($this->price == 0) {
            $this->price = $this->ticket;
        }
    }

    public function render()
    {
        return view('livewire.buttonticket');
    }
}
