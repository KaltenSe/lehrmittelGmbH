<?php
declare(strict_types = 1);

namespace Services\Cart;

/**
 * Class CartService
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-02-16
 */
class CartService
{
    /**
     * @var CartDataProvider
     */
    protected $cartDataProvider;

    /**
     * @var CartDataMutator
     */
    protected $cartDataMutator;

    /**
     * CartService constructor.
     *
     * @param CartDataProvider $cartDataProvider
     * @param CartDataMutator  $cartDataMutator
     */
    public function __construct(CartDataProvider $cartDataProvider, CartDataMutator $cartDataMutator)
    {
        $this->cartDataProvider = $cartDataProvider;
        $this->cartDataMutator = $cartDataMutator;
    }

    public function addArticleToCart(int $idArticle, int $amount) {
        $idUser = $this->getUserId();

        $this->cartDataMutator->addArticleToCart($idArticle, $amount, $idUser);
    }

    public function deleteArticleFromCart(int $idArticle) {
        $idUser = $this->getUserId();

        $this->cartDataMutator->deleteArticleFromCart($idArticle, $idUser);
    }

    public function getAll()
    {
        $idUser = $this->getUserId();
        return $this->cartDataProvider->getAll($idUser);
    }

    private function getUserId() {
        return  auth()->user()->Id;
    }
}
