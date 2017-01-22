<?php

namespace App\Http\Controllers\Article;




use DB;
use App\Http\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

    public function allArticle(HelperController $helperController)
    {
        $articles = Article::all();
        foreach ($articles as $article) {
            if (!$article->description) {
                $article->description = $helperController->makeDescription($article->content);
            }
        }
        return view('allArticles', ['articles' => $articles]);
    }

    public function oneArticle($id)
    {
        $article = Article::find($id);
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
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->description = $request->input('description');

        $article->save();

        $message = trans('messages.addArticle', ['title' => $article->title]);
        $mess = ['message' => $message];
        return redirect()->back()->with($mess);
    }

    public function editArticle($id)
    {
        $article = Article::find($id);
        return view('editArticle', ['id' => $id, 'article' => $article]);
    }

    public function editArticlePost(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->content = $request->input('content');

        $article->save();

        $message = trans('messages.editArticle', ['title' => $article->title]);
        $mess = ['message' => $message];
        return redirect()->back()->with($mess);

    }

    public function deleteArticle($id)
    {
        $article = Article::find($id)->delete();

        $message = trans('messages.deleteArticle');
        $mess = ['message' => $message];
        return redirect('')->with($mess);
    }

}
