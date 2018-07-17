<?php

namespace App\Http\Controllers\API;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class ArticleController extends Controller
{
    public $successStatus = 200;
    public function Articles()
    {
        $articles = Article::all();
        return response()->json(['success' => $articles], $this-> successStatus);
    }
    public function Article($id)
    {
        $article = Article::findorFail($id);
        return response()->json(['success' => $article], $this-> successStatus);
    }
    public function Remove($id)
    {
        $article = Article::findorFail($id);
        $article->delete();
        return response()->json(['success' => $article], $this-> successStatus);
    }
    public function Create(Request $request)
    {
        $this->validate($request,[
            'title'=> 'regex:/^[A-Za-z]{2,8}/ |required',
            'content'=>'regex:/^[A-Za-z]{2,20}/ |required'
        ]);
        $article=new Article();
        $article->title=$request->input('title');
        $article->content=$request->input('content');
        $article->save();
        return response()->json(['success' => $article], $this-> successStatus);
    }
    public function Update($id,Request $request)
    {
        $article=Article::findorFail($id);
        $this->validate($request,[
            'title'=> 'regex:/^[A-Za-z]{2,8}/ |required',
            'content'=>'regex:/^[A-Za-z]{2,20}/ |required'
        ]);
        $article->title=$request->input('title');
        $article->content=$request->input('content');
        $article->save();
        return response()->json(['success' => $article], $this-> successStatus);
    }
}
