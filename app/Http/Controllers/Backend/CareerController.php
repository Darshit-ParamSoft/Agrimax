<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $query = Career::withoutTrashed()->orderBy('id', 'desc');

                return DataTables::of($query)
                    ->addColumn('status_badge', function ($career) {
                        return '<button type="button" class="toggle-status" data-career-id="' . $career->id . '" style="cursor: pointer; font-size: 1.1rem; background: none; border: none;" title="Click to toggle"><i class="uil uil-eye' . ($career->status ? '" style="color: #28a745; font-size: 1.3rem;' : '-slash" style="color: #dc3545; font-size: 1.3rem;') . '"></i></button>';
                    })
                    ->addColumn('action', function ($career) {
                        return view('backend.career.action', compact('career'))->render();
                    })
                    ->rawColumns(['status_badge', 'action'])
                    ->toJson();
            } catch (\Exception $e) {
                \Log::error('CareerController@index - ' . $e->getMessage());
                \Log::error($e->getTraceAsString());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $title = 'Careers';
        return view('backend.career.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Career';
        $career = null;

        return view('backend.career.form', compact('title', 'career'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'career_status' => 'nullable|boolean',
        ]);

        $career = Career::create([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'status' => $request->has('career_status') ? true : false,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('careers.index')
            ->with('success', 'Career created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        $title = 'View Career';
        return view('backend.career.show', compact('title', 'career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        $title = 'Edit Career';
        return view('backend.career.form', compact('title', 'career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'career_status' => 'nullable|boolean',
        ]);

        $career->update([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'status' => $request->has('career_status') ? true : false,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('careers.index')
            ->with('success', 'Career updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $career->deleted_by = auth()->id();
        $career->save();
        $career->delete();

        return response()->json(['success' => true, 'message' => 'Career deleted successfully.']);
    }

    /**
     * Toggle career status
     */
    public function toggleStatus(Request $request)
    {
        $career = Career::find($request->id);
        if ($career) {
            $career->status = !$career->status;
            $career->updated_by = auth()->id();
            $career->save();

            return response()->json(['success' => true, 'status' => $career->status]);
        }

        return response()->json(['success' => false], 404);
    }
}
