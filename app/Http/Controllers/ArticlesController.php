<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\DataTables\ArticlesDataTable;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Category;

class ArticlesController extends Controller
{
    
    public function index(ArticlesDataTable $dataTable)
    {
        if (\Auth::user()->can('manage-user')) {

            return $dataTable->render('articles.index');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
    public function create()
    {
        if (\Auth::user()->can('create-post')) {
            $category = Category::where('tenant_id',tenant('id'))->pluck('name', 'id');
            return  view('articles.create',compact('category'));
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
    public function store(Request $request)
    {
       
        if (\Auth::user()->can('create-post')) {
            $path;
            request()->validate([
                'title' => 'required',

            ]);

            // if ($request->hasFile('photo')) {
            //     $request->validate([
            //         'photo' => 'required',
            //     ]);
            //     // $path = $request->file('photo')->store('badges');
            //     $myimage = $request->photo->extension();
            //     $path=round(microtime(true)).'.'.$myimage;
            //   $request->photo->move(public_path('assets/images/articles'), $path);
       
            // }

      

            // $post = Articles::create([
            //     'title' => $request->title,
            //     'description' => $request->description,
            //     'category_id' => 0,
            //     'photo' => '',
            //     'short_description' => '$request->body',
            //     'slug' => $request->slug
            // ]);

            $articles = new Articles();
            $articles->title = $request->title;
            $articles->description = $request->description;
            $articles->category_id = 0;
            $articles->photo = '';
            $articles->keywords = $request->keywords;
            $articles->short_description = $request->reference;
            $articles->slug_name = $request->keywords;
            $articles->save();
     


            return redirect()->route('article.index')->with('success', 'FAQ Added Successfully.');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Auth::user()->can('edit-post')) {
            $articles = Articles::find($id);

            $category = Category::where('tenant_id',tenant('id'))->pluck('name', 'id');
            return  view('articles.edit', compact('articles','category'));
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }

        /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (\Auth::user()->can('edit-post')) {
           

            $articles = Articles::find($id);
            $articles->title = $request->title;
            $articles->description = $request->description;
            $articles->category_id = 0;
            $articles->photo = '';
            $articles->keywords = $request->keywords;
            $articles->short_description = $request->reference;
            $articles->slug_name = $request->keywords;
            $articles->save();
         
            return redirect()->route('article.index')->with('success', 'FAQ Updated Successfully');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
    public function article_details($slug, Request $request)
    {
        $post = Articles::where('slug_name', $slug)->first();
        $random_posts = Articles::where('slug_name', '!=', $slug)->limit(3)->get();


        return view('articles.details', compact('post', 'random_posts'));
    }

    public function all_article()
    {
        $categories = Category::all();
        $category = [];
        $category['0'] = __('Select Category');
        foreach ($categories as $cate) {
            $category[$cate->id] = $cate->name;
        }
         $posts = Articles::all();
        return view('articles.view', compact('posts', 'category'));
    }
    public function destroy($id)
    {
     
            $role = Articles::find($id);
         
                $role->delete();
           
            return redirect()->route('article.index')
                ->with('success', 'Article deleted successfully');
       
    }
}
