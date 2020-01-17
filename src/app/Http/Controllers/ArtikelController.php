<?php

namespace App\Http\Controllers;

use App\Services\Artikel\ArticleService;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function show(ArticleService $articleService)
    {
        $article = $articleService->getAll();
        return response()->json($article);
    }
}
