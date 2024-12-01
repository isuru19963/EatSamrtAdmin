<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\DataTables\FoodItemsTable;
use App\Models\FoodItems;
use App\Models\FoodItemsCategory;

// use Uuid;
use App\Models\User;
use App\DataTables\FoodItemsDataTable;
use App\DataTables\FoodItemsTable;
class FoodItemsOrderController extends Controller
{
    public function index(FoodItemsDataTable $dataTable)
    {
        if (\Auth::user()->can('manage-user')) {
            return $dataTable->render('food_item_orders.index');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
    public function create()
    {
        if (\Auth::user()->can('create-post')) {
            $badge = User::Where('type','Vendor')->get();
            $category = FoodItemsCategory::all();
      
            return  view('food_item_orders.create', compact('badge','category'));
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
              $request->photo->move(public_path('assets/images/foods'), $path);
       
            }

            $post = FoodItems::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $path,
                'price' => $request->price,
                'category' => $request->category,
                'vendor_id' => $request->vendor_id,
            ]);

            return redirect()->route('fooditems.index')->with('success', 'Food Added successfully.');
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
            $badge = FoodItems::find($id);

            // $category = Category::where('tenant_id',tenant('id'))->pluck('name', 'id');
            return  view('foods.edit', compact('badge'));
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

            $Badges = FoodItems::find($id);
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

            return redirect()->route('foods.index')->with('success', 'Badge updated successfully');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
}
