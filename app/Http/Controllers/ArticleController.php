<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ArticleController extends Controller
{
    public function show(){
        //$articles = DB::table('articles')->orderBy('id','DESC')->get();
        //now using Eloquent ORM
        $articles = Article::all();
        return view('list')->with(compact('articles'));
    }
    public function addArticle(){
        return view('add');
    }
    public function saveArticle( Request $request ){
        $validator = Validator::make($request->all(),[
            'article_type'=>'required|max:50',
            'title'=>'required|max:255',
            'description'=>'required',
            'author'=>'required|max:100'
        ]);
        if($validator->passes()){
            //insert record in DB
            $article = new Article;
            $article->article_type = $request->article_type;
            $article->title = $request->title;
            $article->description = $request->description;
            $article->author = $request->author;
            $article->save();
            $request->session()->flash('msg','Article Saved Successfully');
            return redirect('articles');
        } else {
            return redirect('articles/add')->withErrors($validator)->withInput();
            //return with error.
        }
    }
    public function editArticle($id, Request $request ){
        //fetch record from DB
        $article = Article::where('id',$id)->first();
        if(! $article){
            $request->session()->flash('errorMsg','Record Not Found');
            return redirect('articles');
        }
        return view('edit')->with(compact('article'));
    }
    public function updateArticle($id, Request $request){
        $validator = Validator::make($request->all(),[
            'article_type'=>'required|max:50',
            'title'=>'required|max:255',
            'description'=>'required',
            'author'=>'required|max:100'
        ]);
        if($validator->passes()){
            $article = Article::find($id);
            $article->article_type = $request->article_type;
            $article->title = $request->title;
            $article->description = $request->description;
            $article->author = $request->author;
            $article->save();
            $request->session()->flash('msg','Article Updated Successfully');
            return redirect('articles');
        } else {
            return redirect('articles/edit/'.$id)->withErrors($validator)->withInput();
            //return with error.
        }
    }
    public function deleteArticle($id, Request $request){
        $article = Article::where('id',$id)->first();
        if(!$article){
            $request->session()->flash('errorMsg','Record Not Found');
            return redirect('articles');
        }
        Article::where('id',$id)->delete();
        $request->session()->flash('successMsg','Record Has Been Deleted.');
        return redirect('articles');
    }
    public function photography(){
        $articles = Article::select('article_type','title','author','id')
                                ->where('id','=','1')
                                ->get();
        return view('photography')->with(compact('articles'));
    }
    public function fashion(){
        $articles = Article::select('article_type','title','author','id')
                                ->where('id','=','2')
                                ->get();
        return view('fashion')->with(compact('articles'));
        // return view('fashion');
    }
    public function scientific(){
        $articles = Article::select('article_type','title','author','id')
                                ->where('id','=','3')
                                ->get();
        return view('scientific')->with(compact('articles'));
        // return view('scientific');
    }
}
