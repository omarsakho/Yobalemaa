<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Location;

class LocationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function build()
    {
        return $this->view('emails.location_created')
                    ->subject('Votre location a été créée avec succès');
    }
}
