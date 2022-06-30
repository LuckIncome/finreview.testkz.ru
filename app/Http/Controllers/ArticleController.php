<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Tag;
use App\Models\Tema;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $paginate = 12;
    public $desc = 'desc';
    public $sort = 'created_at';

    public function index(Request $request)
    {
        $getSort = $request->get('sort');
        if($request->sort == 'sort_by_date') {
            $this->desc = 'desc';
            $this->sort = 'created_at';
        }

        if($request->sort == 'sort_by_views') {
            $this->desc = 'desc';
            $this->sort = 'view_count';
        }

    	$locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $articleCategories = ArticleCategory::with(['translations'])
            ->where('status', true)
            ->orderBy('sort_id', 'asc')
            ->get()
            ->translate($locale, $fallbackLocale);

        $articles = Article::with(['translations'])
            ->with(['article_category' => function($q) {
                    $q->where('status', true)->get();
                }])
            ->where('status', true)
            ->orderBy($this->sort, $this->desc)
            ->paginate($this->paginate)
            ->translate($locale, $fallbackLocale);


        $articles_paginate = Article::where('status', true)->orderBy($this->sort, $this->desc)->paginate($this->paginate);

        if($request->ajax()) {
            $view = view('partials.loops.articles', compact('articles'))->render();
            return response()->json(['html'=>$view]);
        }

        $page = Page::with(['translations'])->where(['type' => 'category'])->firstOrFail();
    	$page = $page->translate($locale, $fallbackLocale);
        return view('pages.category.index', compact(
            'page',
            'articleCategories',
            'articles',
            'articles_paginate',
            'getSort'
        ));
    }

    public function show($locale, $categories, Request $request)
    {
        $getSort = $request->get('sort');
        if($request->sort == 'sort_by_date') {
            $this->desc = 'desc';
            $this->sort = 'created_at';
        }

        if($request->sort == 'sort_by_views') {
            $this->desc = 'desc';
            $this->sort = 'view_count';
        }

    	$locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $articleCategories = ArticleCategory::with(['translations'])
            ->where('status', true)
            ->orderBy('sort_id', 'asc')
            ->get()
            ->translate($locale, $fallbackLocale);

        $articles = ArticleCategory::with(['translations'])
            ->with(['article' => function($q) {
                $q->where('status', true)->orderBy($this->sort, $this->desc)->paginate($this->paginate);
            }])
            ->where('status', true)
            ->where('slug', $categories)
            ->get()
            ->translate($locale, $fallbackLocale);

        if($request->ajax()) {
            $view = view('partials.loops.articles_show', compact('articles'))->render();
            return response()->json(['html'=>$view]);
        }

        if (strpos(url()->current(), $categories) !== false) {
            $articles_paginate = ArticleCategory::where('slug', $categories)->firstOrFail()->article()->paginate($this->paginate);

            $categorySEO = ArticleCategory::with(['translations'])
                ->where('status', true)
                ->where('slug', $categories)
                ->firstOrFail()
                ->translate($locale, $fallbackLocale);
        } else {
            abort(404);
        }
        return view('pages.category.show', compact(
            'articleCategories',
            'articles',
            'categorySEO',
            'articles_paginate',
            'getSort'
        ));
    }

    public function articleShow($locale, $categories, $article_slug)
    {
        $fallbackLocale = config('voyager.multilingual.default');

        $c = Article::select('content')
        ->where('slug', $article_slug)
        ->where('status', true)
        ->first();

        if (strpos(url()->current(), $article_slug) !== false) {
            $articleCategory = ArticleCategory::with(['translations'])
                ->where('slug', $categories)
                ->where('status', true)
                ->firstOrFail()
                ->translate($locale, $fallbackLocale);

            $article = Article::with(['translations'])
                ->with(['tag' => function($q) {
                    $q->where('status', true)->orderBy('sort_id', 'asc')->get();
                }])
                ->where('slug', $article_slug)
                ->where('status', true)
                ->firstOrFail()
                ->translate($locale, $fallbackLocale);
        } else {
            abort(404);
        }

        $tema_id = Article::with(['tema'])->where('slug', $article_slug)->first();
        if($tema_id->tema !== NULL) {
            $tema_id = $tema_id->tema->id;
            $temas = Tema::with(['translations'])
                ->with(['article' => function($q) use($article_slug) {
                    $q->with(['article_category'])->where('slug', '!=', $article_slug)->where('status', true)->orderBy('created_at', 'desc')->paginate(4);
                }])
                ->where('status', true)
                ->where('id', $tema_id)
                ->get()
                ->translate($locale, $fallbackLocale);
            $temas_paginate = Tema::where('id', $tema_id)
                ->firstOrFail()
                ->article()
                ->where('slug', '!=', $article_slug)
                ->paginate(4);
        } else {
            $temas = 'Материалы отсутствует!';
            $temas_paginate = '';
        }

        $author_count = Article::select('author')->where('author', $article->author)->get();

        $articles = ArticleCategory::with(['translations'])
            ->with(['article' => function($q) use($article_slug) {
                $q->where('slug', '!=', $article_slug)->where('status', true)->orderBy('created_at', 'desc')->take(4)->get();
            }])
            ->where('status', true)
            ->where('slug', $categories)
            ->get()
            ->translate($locale, $fallbackLocale);

        if($categories == 'opinions') {
            $opinions = ArticleCategory::with(['translations'])
            ->with(['article' => function($q) {
                $q->where('status', true)->orderBy('created_at', 'desc')->take(4)->get();
            }])
            ->where('status', true)
            ->whereNotIn('slug', ['ratings', 'opinions'])
            ->get()
            ->translate($locale, $fallbackLocale);
        } else {
            $opinions = ArticleCategory::with(['translations'])
                ->with(['article' => function($q) {
                    $q->where('status', true)->orderBy('created_at', 'desc')->take(4)->get();
                }])
                ->where('status', true)
                ->where('slug', 'opinions')
                ->get()
                ->translate($locale, $fallbackLocale);
        }

        if($categories == 'ratings') {
            $ratings = ArticleCategory::with(['translations'])
                ->with(['article' => function($q) {
                    $q->where('status', true)->orderBy('created_at', 'desc')->take(4)->get();
                }])
                ->where('status', true)
                ->whereNotIn('slug', ['ratings', 'opinions'])
                ->get()
                ->translate($locale, $fallbackLocale);
        } else {
            $ratings = ArticleCategory::with(['translations'])
                ->with(['article' => function($q) {
                    $q->where('status', true)->orderBy('created_at', 'desc')->take(4)->get();
                }])
                ->where('status', true)
                ->where('slug', 'ratings')
                ->get()
                ->translate($locale, $fallbackLocale);
        }

        return view('pages.category.article_show', compact(
            'article',
            'articleCategory',
            'author_count',
            'articles',
            'ratings',
            'opinions',
            'c',
            'temas',
            'temas_paginate'
        ));
    }
}
