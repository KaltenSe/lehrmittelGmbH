<?php
declare(strict_types = 1);

namespace Services\Article;

use App\artikel;

/**
 * Class ArticleDataMutator
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-02-13
 */
class ArticleDataMutator
{
    public function storeArticle(array $article)
    {
        try {
            artikel::insert();
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}
