<?php

namespace App\Http\Controllers;
use App\DataTables\FoodItemCategoryDataTable;
use Illuminate\Http\Request;
use App\Models\FoodItemsCategory;
// use Uuid;
class FoodItemCategoryController extends Controller
{
    public function index(FoodItemCategoryDataTable $dataTable)
    {
        if (\Auth::user()->can('manage-user')) {
            return $dataTable->render('foods_category.index');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
    public function create()
    {
        if (\Auth::user()->can('create-post')) {
            return  view('foods_category.create');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
    public function store(Request $request)
    {
        if (\Auth::user()->can('create-post')) {
            request()->validate([
                'name' => 'required',

            ]);

            if ($request->hasFile('photo')) {
                $request->validate([
                    'photo' => 'required',
                ]);
                // $path = $request->file('photo')->store('badges');
                $myimage = $request->photo->extension();
                $path=round(microtime(true)).'.'.$myimage;
              $request->photo->move(public_path('assets/images/category'), $path);
       
            }

            $post = FoodItemsCategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $path,
                'status'=>1
            ]);

            return redirect()->route('foods_category.index')->with('success', 'Category Added successfully.');
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
            $badge = FoodItemsCategory::find($id);

            // $category = Category::where('tenant_id',tenant('id'))->pluck('name', 'id');
            return  view('fooditemscategory.edit', compact('badge'));
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
            request()->validate([
                'interval_time' => 'required',
                'status' => 'required',
            ]);

            $Badges = FoodItemsCategory::find($id);
            if ($request->hasFile('photo')) {
                $request->validate([
                    'photo' => 'required',
                ]);
                // $path = $request->file('photo')->store('badges');
                $myimage = $request->photo->extension();
                $path=round(microtime(true)).'.'.$myimage;
              $request->photo->move(public_path('assets/images/badges'), $path);

              $Badges->image = $path;
       
            }
            $Badges->interval_time = $request->interval_time;
            $Badges->save();

            return redirect()->route('fooditemscategory.index')->with('success', 'Category updated successfully');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
}
