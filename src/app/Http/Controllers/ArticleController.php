<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Services\Article\ArticleService;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    protected $articleService;

    /**
     * ArticleController constructor.
     *
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $articles = $this->articleService->getAllArticles($request);
        $data['articles'] = $articles;
        return view('article.articles', $data);
    }

    /**
     * get the article depending on the given article Id
     *
     * @since  2020-02-13
     *
     * @param int $articleId
     *
     * @throws Exception
     * @return   mixed
     *
     */
    public function show(int $articleId)
    {
        try {
            return $this->articleService->getArticle($articleId);
        } catch (QueryException $exception) {
            throw new Exception(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    public function store(Request $request) {
        try {
            $this->articleService->storeArticles($request);
        } catch (\Throwable $throwable) {
            dd($throwable);
        }
    }
}
