<?php

namespace App\Http\Controllers;
use App\DataTables\ChallengeDataTable;
use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    public function index(ChallengeDataTable $dataTable)
    {
        if (\Auth::user()->can('manage-user')) {
            return $dataTable->render('challenges.index');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
}
