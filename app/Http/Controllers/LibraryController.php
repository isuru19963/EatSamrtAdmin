<?php

namespace App\Http\Controllers;
use App\DataTables\LibraryDataTable;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(LibraryDataTable $dataTable)
    {
        if (\Auth::user()->can('manage-user')) {
            return $dataTable->render('library.index');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
}
