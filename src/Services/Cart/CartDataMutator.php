<?php
declare(strict_types = 1);

namespace Services\Cart;

use App\warenkorbposition;

/**
 * Class CartDataMutator
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-02-16
 */
class CartDataMutator
{

    public function addArticleToCart(int $idArticle, int $amount,int $idUser)
    {
        warenkorbposition::insert([
            'BenutzerId' => $idUser,
            'ArtikelId' => $idArticle,
            'Anzahl' => $amount
        ]);
    }

    public function deleteArticleFromCart(int $idArticle, int $idUser)
    {
        warenkorbposition::where('ArtikelId', '=', $idArticle)
            ->where('BenutzerId', '=', $idUser)
            ->delete();
    }
}
