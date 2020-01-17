<?php

namespace App\Services\Bestellposition;

use App\bestellung;

/**
 * Class bestellpositionService
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-01-17
 */
class bestellpositionService
{
    public function getAll()
    {
        return bestellung::all();
    }

}
