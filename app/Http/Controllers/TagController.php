<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use App\Models\ArticleCategory;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public $paginate = 12;

    public function index($locale)
    {
        $fallbackLocale = config('voyager.multilingual.default');

        $tags = Tag::with(['translations'])
            ->withCount(['article'])
            ->where('status', true)
            ->get()
            ->sortByDesc('article_count')
            ->translate($locale, $fallbackLocale);

        $page = Page::with(['translations'])->where(['type' => 'tag'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.tag.index', compact('page', 'tags'));
    }

    public function show($locale, $tags, Request $request)
    {
        $fallbackLocale = config('voyager.multilingual.default');

        $tag = Tag::with(['translations'])
            ->where('status', true)
            ->orderBy('sort_id', 'asc')
            ->where('slug', $tags)
            ->first()
            ->translate($locale, $fallbackLocale);

        $allTags = Tag::with(['translations'])
            ->withCount(['article'])
            ->where('status', true)
            ->get()
            ->sortByDesc('article_count')
            ->translate($locale, $fallbackLocale);

        $articles = Tag::with(['translations'])
            ->with(['article' => function($q) {
                $q->with(['article_category'])
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate);
            }])
            ->where('slug', $tags)
            ->where('status', true)
            ->first();
        $articles =  $articles->translate($locale, $fallbackLocale);

        $articles_paginate = Tag::where('slug', $tags)
            ->first()
            ->article()
            ->with(['article_category'])
            ->paginate($this->paginate);

        if($request->ajax()) {
            $view = view('partials.loops.articles', compact('articles'))->render();
            return response()->json(['html'=>$view]);
        }

        $page = Page::with(['translations'])->where(['type' => 'tag'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.tag.show', compact('page', 'tag', 'allTags', 'articles', 'articles_paginate'));
    }
}
