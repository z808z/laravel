<?php

namespace App\Http\Controllers\Article;

use App\Articles;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

    public function allArticle()
    {
        $articles = Articles::all();
        return view('allArticles', ['articles' => $articles]);
    }

    public function oneArticle($id)
    {
        $article = Articles::find($id);
        if($article) {
            return view('oneArticle', ['title' => $article->title, 'article' => $article]);
        }
        else {
            abort(404);
        }
    }

    public function addArticle()
    {
        return view('addArticle');
    }

    public function addArticlePost(Request $request)
    {
        $article = new Articles();
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        $article->description = strip_tags($article->content);
        $article->description = substr($article->description, 0, 250);
        $article->description = rtrim($article->description, "!,.-");
        $article->description = substr($article->description, 0, strrpos($article->description, ' ')) . "...";

        $article->save();
        return view('addArticlePost', ['title' => $article->title, 'article' => $article]);
    }

    public function editArticle($id)
    {
        $article = Articles::find($id);
        return view('editArticle', ['id' => $id, 'article' => $article]);
    }

    public function editArticlePost(Request $request, $id)
    {
        $article = Articles::find($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        $article->description = strip_tags($article->content);
        $article->description = substr($article->description, 0, 250);
        $article->description = rtrim($article->description, "!,.-");
        $article->description = substr($article->description, 0, strrpos($article->description, ' ')) . "...";

        $article->save();

        $mess = ['message'=>'Статья была успешно изменена'];
        return redirect()->back()->with($mess);

    }

    public function deleteArticle($id)
    {
        $article = Articles::find($id);
        $article->delete();
        return view('deleteArticle');
    }

}
