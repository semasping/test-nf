<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('category')->orderByDesc('created_at')->get();
        return view('news.list')->with('news',$news);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $news = News::with('category')->orderByDesc('created_at')->get();
        return view('manager.list')->with('news',$news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('manager.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'category_id' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return Redirect::route('manager.create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $news = new News();
            $news->title       = $request->get('title');
            $news->body      = $request->get('body');
            $news->category_id = $request->get('category_id');
            $news->save();

            // redirect
            Session::flash('message', 'Successfully created news!');
            return Redirect::to('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        $news = News::with('category')->find($id);
        return view('news.show')->with('news',$news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $categories = Category::all();
        $news = News::find($id);
        return view('manager.edit')->with('categories',$categories)->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'title'       => 'required',
            'category_id' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return Redirect::route('manager.create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $news = News::find($id);
            $news->title       = $request->get('title');
            $news->body      = $request->get('body');
            $news->category_id = $request->get('category_id');
            $news->save();

            // redirect
            Session::flash('message', 'Successfully updated news:'.$news->title);
            return Redirect::to('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        (News::find($id))->delete();
        Session::flash('message', 'Successfully deleted news!');
        return Redirect::to('/');
    }
}
