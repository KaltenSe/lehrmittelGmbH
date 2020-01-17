<?php

namespace App\Services\Benutzer;

use App\benutzer;

/**
 * Class BenutzerService
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-01-17
 */
class BenutzerService
{

    public function getAll(){
        return benutzer::all();
    }
}
