<?php

namespace App\DataTables;

use App\Facades\UtilityFacades;
use App\Models\FoodItemsCategory;
use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Illuminate\Support\Facades\Storage;

class FoodItemCategoryDataTable extends DataTable
{

    public function dataTable($query)
    {
        return  Auth::user()->type=='Super Admin'?
        
        datatables()
        ->eloquent($query)
        ->addIndexColumn()
        ->editColumn('created_at', function ($request) {
            return UtilityFacades::date_time_format($request->created_at);
        })
       
        ->addColumn('action', function (FoodItemsCategory $category) {
            return view('foods_category.action', compact('category'));
        })
        ->editColumn('status', function (FoodItemsCategory $category) {
            if ($category->status==1) {
                return '<span class="custom-badge rounded-pill rounded-pill bg-success">' . __('Active') . '</span>';
            } else {
                return '<span class="custom-badge rounded-pill rounded-pill bg-danger">' . __('Inactive') . '</span>';
            }
        })
       
        ->editColumn("image", function (FoodItemsCategory $post) {
            return "<img src=" .asset('assets/images/category/'.$post->image). " width='100' />";
        })
        ->rawColumns([ 'action','status','image']):

        datatables()
        ->eloquent($query)
        ->addIndexColumn()
        ->editColumn('created_at', function ($request) {
            return UtilityFacades::date_time_format($request->created_at);
        })
       
       
        ->editColumn('status', function (FoodItemsCategory $category) {
            if ($category->status==1) {
                return '<span class="custom-badge rounded-pill rounded-pill bg-success">' . __('Active') . '</span>';
            } else {
                return '<span class="custom-badge rounded-pill rounded-pill bg-danger">' . __('Inactive') . '</span>';
            }
        })
       
        ->editColumn("image", function (FoodItemsCategory $post) {
            return "<img src=" .asset('assets/images/category/'.$post->image). " width='100' />";
        })
        ->rawColumns([ 'status','image']);
    }

    public function query(FoodItemsCategory $model)
    {
        // if (tenant('id')==null) {
        //     return $model->newQuery()->where('type','User');
        // } else {
            // return $model->newQuery()->where('type','=','User');
        // }
          return $model->newQuery()->orderBy('id', 'asc');
    }

    public function html()
    {
        return 
        Auth::user()->type=='Super Admin'?
        $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->language([
                "paginate" => [
                    "next" => '<i class="ti ti-chevron-right"></i>',
                    "previous" => '<i class="ti ti-chevron-left"></i>'
                ]
            ])
            ->parameters([
                "dom" =>  "
                               <'row'<'col-sm-12'><'col-sm-9 'B><'col-sm-3'f>>
                               <'row'<'col-sm-12'tr>>
                               <'row mt-3'<'col-sm-5'i><'col-sm-7'p>>
                               ",
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-primary btn-sm no-corner add_module', 'action' => " function ( e, dt, node, config ) {
                        window.location = '" . route('fooditemscategory.create') . "';

                   }"],
                    ['extend' => 'export', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'pageLength', 'className' => 'btn btn-primary btn-sm no-corner',],
                ],
                "scrollX" => true
            ])->language([
                'buttons'=>[
                    'create'=>__('Create'),
                    'export'=>__('Export'),
                    'print'=>__('Print'),
                    'reset'=>__('Reset'),
                    'reload'=>__('Reload'),
                    'excel'=>__('Excel'),
                    'csv'=>__('CSV'),
                    'pageLength'=>__('Show %d rows'),
                ]
            ]):
            $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->language([
                "paginate" => [
                    "next" => '<i class="ti ti-chevron-right"></i>',
                    "previous" => '<i class="ti ti-chevron-left"></i>'
                ]
            ])
            ->parameters([
                "dom" =>  "
                               <'row'<'col-sm-12'><'col-sm-9 'B><'col-sm-3'f>>
                               <'row'<'col-sm-12'tr>>
                               <'row mt-3'<'col-sm-5'i><'col-sm-7'p>>
                               ",
                'buttons'   => [
                //     ['extend' => 'create', 'className' => 'btn btn-primary btn-sm no-corner add_module', 'action' => " function ( e, dt, node, config ) {
                //         window.location = '" . route('fooditemscategory.create') . "';

                //    }"],
                    ['extend' => 'export', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'pageLength', 'className' => 'btn btn-primary btn-sm no-corner',],
                ],
                "scrollX" => true
            ])->language([
                'buttons'=>[
                    'create'=>__('Create'),
                    'export'=>__('Export'),
                    'print'=>__('Print'),
                    'reset'=>__('Reset'),
                    'reload'=>__('Reload'),
                    'excel'=>__('Excel'),
                    'csv'=>__('CSV'),
                    'pageLength'=>__('Show %d rows'),
                ]
            ]);
    }

    protected function getColumns()
    {return 
        Auth::user()->type=='Super Admin'?
        [
            Column::make('No')->title(__('No'))->data('DT_RowIndex')->name('DT_RowIndex')->searchable(false)->orderable(false),
            Column::make('name')->title(__('Category Name')),
            Column::make('image')->title(__('Image')),
            Column::make('description')->title(__('Description')),
            Column::make('status')->title(__('Status')),
            Column::computed('action')->title(__('Action'))
            // Column::computed('created_at')->title(__('Action'))
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center action-width')
                  ->width('20%'),
        ]:
         [
            
         ];

    }

    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
