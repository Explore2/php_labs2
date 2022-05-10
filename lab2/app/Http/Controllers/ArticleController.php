<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showArticle($id)
    {
        $tagId = ArticleTag::query()->select("tag_id")->where('article_id', $id)->get();
        return view('postsId', [
            'article' => Article::query()->find($id),
            'tags' => Tag::query()->orderBy('name')->findMany($tagId)
        ]);
    }

    public function showArticlesList(Request $request)
    {
        $code = $request->input("code");
        $title = $request->input("title");
        $tag = $request->input("tag");
        $filterQuery = Article::query();
        $filterQuery->when($code, function ($query) use ($request) {
            $query->where('alpha_numeric_code', $request->code);
        });
        $filterQuery->when($title, function ($query) use ($request) {
            $query->where('title', $request->title);
        });
        $filterQuery->when($tag, function ($query) use ($request) {
            $tagId = Tag::query()->where('name', $request->tag)->value('id');
            $articleId = ArticleTag::query()->selectRaw('article_id')->where('tag_id', $tagId)->get();
            $query->findMany($articleId);
        });
        return view('posts', [
            'articleArray' => $filterQuery->get()
        ]);
    }
}
