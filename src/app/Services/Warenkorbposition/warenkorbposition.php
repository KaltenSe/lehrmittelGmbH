<?php

namespace App\Services\Warenkorbposition;

use App\Services;

/**
 * Class warenkorbposition
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-01-17
 */
class warenkorbposition
{

    public function getAll()
    {
        return warenkorbposition::all();
    }
}
