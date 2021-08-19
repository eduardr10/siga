<?php

namespace App\Http\Livewire\Clients;

use App\Models\Client;
use App\Models\Identity;
use Livewire\Component;
use Livewire\WithPagination;

class ClientsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $section = "Clientes";
    public $name;
    public $identity_number;
    public $page_title = "Clientes";


    public function render()
    {
        $clients = Client::orderBy('id', 'DESC')->paginate(15);
        return view('livewire.clients.clients-component', compact('clients'));
    }

    public function mount(){
        
    }

    public function store(){
        $identity = new Identity(
            [
                "name"              => $this->name,
                "identity_number"   => $this->identity_number,
                'avatar_id'         => 1,
            ]
        );
        if($identity->saveOrFail()){
            $client = Client::create(
                [
                    'identity_id' => $identity->id,
                ]
            );
        }


        session()->flash('message', 'Cliente añadido.');

        $this->resetInputFields();

        $this->emit('clientStore'); // Close model to using to jquery
    }
    public function resetInputFields(){
        $this->reset(['name', 'identity_number']);
    }

    public function show($client){
    }
}
