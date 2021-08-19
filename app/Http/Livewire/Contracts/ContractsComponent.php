<?php

namespace App\Http\Livewire\Contracts;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Order;
use App\Models\Cocoa;
use App\Models\Client;
use App\Models\Quality;
use Livewire\Component;
use App\Models\Contract;
use Livewire\WithPagination;

class ContractsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $description;
    public $destination;
    public $date;
    public $documentation;
    public $quantity;

    public $clients;
    public $units;
    public $cocoas;
    public $qualities;

    public $client_id;
    public $unit_id;
    public $cocoa_id;
    public $quality_id;
    public $orders = [];

    public function render()
    {
        $contracts = Contract::orderBy('id', 'DESC')->paginate(15);
        $this->cocoas = Cocoa::all();
        $this->qualities = Quality::all();
        $this->units = Unit::all();
        $this->clients = Client::all();

        $cocoas = $this->cocoas;
        $qualities = $this->qualities;
        $units = $this->units;
        $clients = $this->clients;

        $this->quality_id = $this->qualities->first()->id;
        $this->unit_id = $this->units->first()->id;
        $this->cocoa_id = $this->cocoas->first()->id;
        $this->client_id = $this->clients->first()->id;

        return view('livewire.contracts.contracts-component', compact(
            'contracts', 
            'units', 
            'qualities', 
            'cocoas',
            'clients'
        ));
    }

    public function mount()
    {
        $this->date = Carbon::now()->format('Y-m-d'); 
        // $this->orders[] =
            // [
                // 'quantity'  => 1,
                // 'quality_id'=> $this->quality_id,
                // 'unit_id'=> $this->unit_id,
                // 'cocoa_id'=> $this->cocoa_id,
            // ];
    }

    public function addOrder()
    {
        $this->orders[] = [
            'quantity'  => 1,
            'quality_id'=> $this->quality_id,
            'unit_id'=> $this->unit_id,
            'cocoa_id'=> $this->cocoa_id,
        ];
    }

    public function removeOrder($index)
    {
        unset($this->orders[$index]);
        $this->orders = array_values($this->orders);
    }


    public function store(){
        $contract = Contract::create(
            [
                'description'   => $this->description ?? "Algo por defecto",
                'destination'   => $this->destination ?? "Un Lugar por defecto",
                'documentation' => $this->documentation,
                'date'          => date('Y-m-d', strtotime($this->date)),
                'client_id'     => $this->client_id,
            ]
        );
        if(count($this->orders)){
            foreach($this->orders as $order){
                Order::create(
                    [
                        'quantity'    => $order['quantity'],
                        'contract_id' => $contract->id,
                        'cocoa_id'    => $order['cocoa_id'],
                        'unit_id'     => $order['unit_id'],
                        'quality_id'  => $order['quality_id'],
                    ]
                );
            }
        }

        session()->flash('message', 'Contrato añadido.');

        $this->resetInputFields();

        $this->emit('clientStore'); // Close model to using to jquery
    }

    public function resetInputFields(){
        $this->reset(
            [
                'description',
                'destination',
                'documentation',
                'quantity',
                'date',
                'unit_id',
                'cocoa_id',
                'client_id',
                'quality_id',
            ]
        );
    }
}
