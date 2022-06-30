<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use TCG\Voyager\Models\Page;
use App\Models\About;
use App\Models\Team;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Cartoon;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{

    public $paginate = 12;
    public $desc = 'desc';
    public $sort = 'created_at';

    public function getPage($locale, $slug = 'home')
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        if (strpos(url()->current(), 'home') !== false) {
            abort(404);
        } else {
            $page = Page::select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
                ->where(['slug' => $slug, 'status' => Page::STATUS_ACTIVE])
                ->firstOrFail();
        }
        $page = $page->translate($locale, $fallbackLocale);

        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        switch ($page->type) {
            case 'home':
                $research = Page::with(['translations'])
                    ->where('type', ['researches'])
                    ->where('status', Page::STATUS_ACTIVE)
                    ->first();
                $research = $research->translate($locale, $fallbackLocale);

                $research_one = Article::with(['translations'])
                    ->with(['cat'])
                    ->has('cat')
                    ->where('status', true)
                    ->orderBy('created_at', 'desc')
                    ->first()
                    ->translate($locale, $fallbackLocale);

                $researches = Article::with(['translations'])
                    ->with(['cat'])
                    ->has('cat')
                    ->where('id', '!=', $research_one->id)
                    ->where('status', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(3)
                    ->translate($locale, $fallbackLocale);

                $rating = ArticleCategory::with(['translations'])
                    ->where('status', true)
                    ->where('slug', 'ratings')
                    ->first()
                    ->translate($locale, $fallbackLocale);

                $rating_one = ArticleCategory::with(['translations'])
                    ->with(['article' => function($q) {
                        $q->where('status', true)->orderBy('created_at', 'desc')->first();
                    }])
                    ->where('status', true)
                    ->where('slug', 'ratings')
                    ->first()
                    ->translate($locale, $fallbackLocale);

                $r_id = '';
                foreach($rating_one->article as $r) {
                    $r_id .= $r->id;
                }

                $ratings = ArticleCategory::with(['translations'])
                    ->with(['article' => function($q) use($r_id) {
                        $q->where('status', true)
                            ->where('id', '!=', $r_id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(3);
                    }])
                    ->where('status', true)
                    ->where('slug', 'ratings')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $opinion = ArticleCategory::with(['translations'])
                    ->where('status', true)
                    ->where('slug', 'opinions')
                    ->first()
                    ->translate($locale, $fallbackLocale);

                $opinions = ArticleCategory::with(['translations'])
                    ->with(['article' => function($q) {
                        $q->where('status', true)->orderBy('created_at', 'desc')->paginate(4);
                    }])
                    ->where('status', true)
                    ->where('slug', 'opinions')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $tags = Tag::with(['translations'])
                    ->withCount(['article'])
                    ->where('status',true)
                    ->get()
                    ->sortByDesc('article_count')
                    ->translate($locale, $fallbackLocale);

                $populars = Article::with(['translations'])
                    ->with(['article_category'])
                    ->where('status', true)
                    ->where('choice', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(3)
                    ->translate($locale, $fallbackLocale);

                $editorials = Article::with(['translations'])
                    ->with(['article_category'])
                    ->where('status', true)
                    ->where('popular', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(3)
                    ->translate($locale, $fallbackLocale);

                $image = Article::with(['translations'])
                    ->select('image', 'title')
                    ->where('status', true)
                    ->orderBy('created_at', 'desc')
                    ->first()
                    ->translate($locale, $fallbackLocale);

                $cartoon = Cartoon::with(['translations'])
                    ->orderBy('created_at', 'desc')
                    ->first()
                    ->translate($locale, $fallbackLocale);

                return view('pages.' . $page->type, compact(
                    'page',
                    'tags',
                    'opinions',
                    'opinion',
                    'ratings',
                    'rating',
                    'rating_one',
                    'research',
                    'researches',
                    'research_one',
                    'editorials',
                    'populars',
                    'image',
                    'cartoon'
                ));
                break;

            case 'cartoons':
                $cartoons = Cartoon::with(['translations'])
                    ->orderBy('created_at', 'desc')
                    ->paginate($this->paginate)
                    ->translate($locale, $fallbackLocale);
                $cartoons_paginate = Cartoon::orderBy('created_at', 'desc')
                    ->paginate($this->paginate);
                return view('pages.' . $page->type, compact('page', 'cartoons', 'cartoons_paginate'));
                break;

            case 'about':
                $about = About::with(['translations'])->firstOrFail();
                $about = $about->translate($locale, $fallbackLocale);
                return view('pages.' . $page->type, compact('page', 'about'));
                break;

            case 'team':
                $teams = Team::with(['translations'])->where('status',true)->orderBy('sort_id')->get();
                $teams = $teams->translate($locale, $fallbackLocale);

                return view('pages.' . $page->type, compact('page', 'pages', 'teams'));
                break;

            case 'contacts':
                return view('pages.' . $page->type, compact('page'));
                break;
            case 'simple':
                return view('pages.' . $page->type, compact('page'));
                break;
            default :
                return view('pages.' . $page->type, compact('page'));
                break;
        }
    }

    public function setLocale($lang, $newLang)
    {
        if (in_array($newLang, config()->get('voyager.multilingual.locales'))) {
            session()->put('locale', $newLang);
            app()->setLocale($newLang);
            URL::defaults(['locale' => $newLang]);
            $segments = str_replace($lang.'/',$newLang.'/', \url()->previous());
            return redirect()->to($segments);
        }

    }

    public function getResearch(Request $request)
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

        /*$articles = ArticleCategory::with(['translations'])
            ->with(['article' => function($q) {
                $q->where('status', true)->orderBy($this->sort, $this->desc)->paginate($this->paginate);
            }])
            ->where('status', true)
            ->whereNotIn('slug', ['ratings', 'opinions'])
            ->get()
            ->translate($locale, $fallbackLocale);*/

        $articles = Article::with(['translations'])
            ->with(['cat'])
            ->has('cat')
            ->where('status', true)
            ->orderBy($this->sort, $this->desc)
            ->paginate($this->paginate)
            ->translate($locale, $fallbackLocale);

        //$articles_paginate = Article::where('status', true)->orderBy('sort_id', 'asc')->paginate($this->paginate);
        $articles_paginate = Article::with(['cat'])->has('cat')->where('status', true)->orderBy('sort_id', 'asc')->paginate($this->paginate);

        if($request->ajax()) {
            $view = view('partials.loops.articles', compact('articles'))->render();
            return response()->json(['html'=>$view]);
        }

        $page = Page::with(['translations'])->where(['type' => 'researches'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.researches', compact(
            'page',
            'articleCategories',
            'articles',
            'articles_paginate',
            'getSort'
        ));
    }
}
