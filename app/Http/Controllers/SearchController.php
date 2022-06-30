<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use App\Models\Article;
use App\Models\ArticleCategory;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public $paginate = 10;

    public function index(Request $request) 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        \DB::statement("SET SQL_MODE=''"); //this is the trick use it just before your query
        if($request->get('term')) {         
          $data = Article::with(['translations'])
            ->search($request->get('term'), null, true)
            ->with(['article_category'])
            ->paginate($this->paginate)
            ->translate($locale, $fallbackLocale); 
          return response()->json($data);
        } else {
            $a = $request->get('header_search');
            //$a = 'ЧТО ЖДЕТ РЫНОК НЕДВИЖИМОСТИ';
            //dd($a);
            $data = Article::with(['translations'])
            ->search($a, null, true)
            ->with(['article_category'])
            ->paginate($this->paginate)
            ->translate($locale, $fallbackLocale);    

            $request_search = $request->get('header_search');        
            $articles_paginate = Article::search($a, null, true)->paginate($this->paginate);

            if($request->ajax()) 
            {
                $view = view('partials.loops.article_search', compact('data', 'request_search'))->render();
                return response()->json(['html'=>$view]);
            }
        }

        $page = Page::with(['translations'])->where(['type' => 'search'])->firstOrFail();
        $page = $page->translate($locale,$fallbackLocale);
        return view('pages.search', compact('page', 'data', 'request_search', 'articles_paginate'));
    }

}
