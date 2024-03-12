<?php

namespace App\Mail;

use App\Models\Location;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LocationValidated extends Mailable
{
    use Queueable, SerializesModels;

    public $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function build()
    {
        return $this->subject('Location Validée')->view('emails.location_validated');
    }
}
