<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleList = Article::all()->sortByDesc('created_at')->sortBy('prioritas');
        $activeClasses = ['artl_active','article_active', 'article_requestlist_active'];
        $i = 0;
        return view('article.index', compact('activeClasses', 'articleList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activeClasses = ['artl_active','newar_active'];
         return view('article.create', compact('activeClasses'));
    }

    public function listArticle()
    {
        $articleList = Article::all()->sortByDesc('created_at')->sortBy('prioritas');
        //$activeClasses = ['artl_active', 'articleList_active'];
        $activeClasses = ['artlList_active'];
        //$i = 0;
        return view('article.articleList', compact('activeClasses', 'articleList'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reqArr = $request->all();
       
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename =time().'.'.$extension;
        $file->move('uploads/images/article/', $filename);
        $reqArr['image'] = $filename;
        unset($reqArr['_token']);

        $data = Article::create($reqArr);

        return "OK";

        // $meta = json_decode($request->post('data'), true);
        // $user=User::create($request->all());
        // if($request->hasFile('image')) {
        //    $file = $request->file('image');

        //    //you also need to keep file extension as well
        //    $name = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();

        //    //using the array instead of object
        //    $image['filePath'] = $name;
        //    $file->move(public_path().'/uploads/', $name);
        //    $user->image= public_path().'/uploads/'. $name;
        //    $user->save();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $article = Article::find($id);
        $activeClasses = ['article_active', 'article_requestlist_active'];
        return view('article.readArticle', compact('activeClasses', 'article'));
    }

    public function readAsAdmin($id)
    {
        $article = Article::find($id);
        $activeClasses = ['article_active', 'article_requestlist_active'];
        return view('article.readArticle2', compact('activeClasses', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $activeClasses = ['newar_active', 'article_requestlist_active'];
        return view('article.editArticle', compact('activeClasses', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data = json_decode($request->post('data'), true);
        try{
            $id = $data['id'];
            unset($data['id']);
            Article::where('id', $id)->update($data);
            echo "OK";            
        }catch(Exception $e){
            echo "Error when update data.";
            return false;
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();

        echo "OK";
    }
}
