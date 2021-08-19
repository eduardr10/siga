<?php

namespace Database\Seeders;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Cocoa;
use App\Models\Contract;
use App\Models\Identity;
use App\Models\Order;
use App\Models\Quality;
use App\Models\Unit;
use App\Models\Port;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $avatar = Avatar::factory(1)->create();
        $cocoa = Cocoa::create([
            'name' => 'Carenero',
        ]);
        
        $quality = Quality::create([
            'quality' => 'F1',
        ]);
        
        $identity = Identity::create([
            'name'              => 'Empresa 001',
            'identity_number'   => '001',
            'avatar_id'         => $avatar->first()->id,
        ]);

        $client = Client::create([
            'identity_id'       => $identity->id,
        ]);

        $unit = Unit::create([
            'unit'      => 'TM',
            'unit_name' => 'Tonelada Métrica',
        ]);

        $contract = Contract::create([
            'description'   => "Descripción",
            'client_id'     => $client->id,
            'date'          => Carbon::now()->format('Y-m-d'),
        ]);

        $order = Order::create(
            [
            'quantity' => 100,
            'contract_id' => $contract->id,
            'quality_id' => $quality->id,
            'unit_id' => $unit->id,
            'cocoa_id' => $cocoa->id,
        ]);

        $ports = Port::create([
            'port' => 'Guanta',
        ]);

        $ports = Port::create([
            'port' => 'La Güaira',
        ]);
    }
}
