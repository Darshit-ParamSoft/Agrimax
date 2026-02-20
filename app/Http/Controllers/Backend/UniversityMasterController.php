<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class UniversityMasterController extends Controller
{
    public function index()
    {
        $title = 'University-Master';
        return view('backend.master.UniversityMaster.index', compact('title'));
    }
}
