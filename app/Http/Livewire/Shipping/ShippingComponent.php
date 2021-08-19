<?php

namespace App\Http\Livewire\Shipping;

use Carbon\Carbon;
use App\Models\Port;
use Livewire\Component;
use App\Models\Contract;
use Livewire\WithPagination;

class ShippingComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $date;
    public $quantity;
    public $port_id;
    public $contract_id;

    public function render()
    {
        $this->date = Carbon::now()->format('d-m-Y');
        $ports = Port::all();
        //Añadir condición para que solo sean los contratos con cantidad faltante
        $contracts = Contract::order_by('id', 'DESC')->get(); 
        return view('livewire.shipping.shipping-component', compact('ports', 'contracts'));
    }

    public function store(){
        Contract::create(
            [
                'quantity'          => $this->quantity,
                'date'              => date('Y-m-d', strtotime($this->date)),
                'contract_id'       => $this->contract_id,
                'port_id'           => $this->port_id,
            ]
        );

        session()->flash('message', 'Contrato añadido.');

        $this->resetInputFields();

        $this->emit('clientStore'); // Close model to using to jquery
    }

    public function resetInputFields(){
        $this->reset(
            [
                'quantity',
                'date',
                'port_id',
                'contract_id',
            ]
        );
    }

}