<?php
declare(strict_types = 1);

namespace Services\Article;

use App\artikel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class ArticleService
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-02-13
 */
class ArticleService
{
    /**
     * @var ArticleDataProvider
     */
    protected $articleDataProvider;

    /**
     * @var ArticleDataMutator
     */
    protected $articleDataMutator;

    /**
     * ArticleService constructor.
     *
     * @param ArticleDataProvider $articleDataProvider
     * @param ArticleDataMutator  $articleDataMutator
     */
    public function __construct(
        ArticleDataProvider $articleDataProvider,
        ArticleDataMutator $articleDataMutator
    )
    {
        $this->articleDataProvider = $articleDataProvider;
        $this->articleDataMutator = $articleDataMutator;
    }

    public function getAllArticles(Request $request)
    {
        $perPage = intval($request->get('perPage')) ?? 5;
        $sort = $request->get('sort') ?? 'id';
        return $this->articleDataProvider->getAllArticles($request);
    }

    public function getArticle(int $idArticle) : artikel
    {
        return $this->articleDataProvider->getArticle($idArticle);
    }

    public function storeArticles(Request $request)
    {
        $articles = $request->all();
        dd($articles);
    }
}
