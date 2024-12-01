<?php

namespace App\Http\Controllers;
use App\DataTables\ChallengeRequestDataTable;
use Illuminate\Http\Request;

class ChallengeRequestController extends Controller
{
    public function index(ChallengeRequestDataTable $dataTable)
    {
        if (\Auth::user()->can('manage-user')) {
            return $dataTable->render('challenge_request.index');
        } else {
            return redirect()->back()->with('failed', __('Permission Denied.'));
        }
    }
}
