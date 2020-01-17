<?php
namespace App\Services\Rabatt;

use App\rabatt;

/**
 * Class RabattService
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-01-17
 */
class RabattService
{
    public function getAll()
    {
        return rabatt::all();
    }

}
