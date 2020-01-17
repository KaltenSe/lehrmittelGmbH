<?php

namespace App\Services\Bestellposition;

use App\Services;

/**
 * Class bestellung
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-01-17
 */
class bestellungService
{

    public function getAll()
    {
        return artikel::all();
    }
}
