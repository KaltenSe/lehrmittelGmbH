<?php

namespace App\Services\Artikel;

use App\artikel;

/**
 * Class ArticleService
 *
 * @author Sebastian Kaltenmaier <sebastian.kaltenmaier@rsu-reifen.de>
 * @since  2020-01-17
 */
class ArticleService
{

    public function getAll()
    {
        return artikel::all();
    }
}
