<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Location;
use App\Models\Vehicule;
use Carbon\Carbon;

class UpdateVehicleStatus extends Command
{
    protected $signature = 'update:vehicle-status';
    protected $description = 'Update vehicle status when rental period ends';

    public function handle()
    {
        $locations = Location::where('heure_fin', '<=', now())->get();

        foreach ($locations as $location) {
            $vehicle = $location->vehicule;
            $vehicle->statut = 'Disponible';
            $vehicle->save();
        }

        $this->info('Vehicle statuses updated successfully.');
    }
}
