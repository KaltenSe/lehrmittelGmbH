<?php
declare(strict_types = 1);

namespace Services\Article;

use App\artikel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ArticleDataProvider
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-02-13
 */
class ArticleDataProvider
{
    /**
     * get the article depending on the given id
     *
     * @since  2020-02-13
     *
     * @param int $idArticle
     *
     * @return   artikel|null
     *
     */
    public function getArticle(int $idArticle) : ?artikel
    {
        return artikel::findOrFail($idArticle);
    }

    public function getAllArticles() : LengthAwarePaginator
    {
        return artikel::paginate(5);
    }
}
