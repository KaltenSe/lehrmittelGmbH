<?php
declare(strict_types = 1);

namespace Services\Cart;

use App\warenkorbposition;

/**
 * Class CartDataProvider
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-02-16
 */
class CartDataProvider
{

    public function getAll($idUser)
    {
        $cart = new warenkorbposition();

        $cart->join('artikel', 'warenkorbposition.ArtikelId', '=', 'artikel.Id')
            ->where('warenkorbposition.BenutzerId', '=', $idUser)
            ->get();
        return $cart;
    }
}
