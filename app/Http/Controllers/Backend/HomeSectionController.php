<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $sections = HomeSection::withoutTrashed();
            return DataTables::of($sections)
                ->addColumn('value_preview', function ($section) {
                    $preview = strlen($section->section_value) > 100
                        ? substr(strip_tags($section->section_value), 0, 100) . '...'
                        : strip_tags($section->section_value);
                    return $preview ?: 'N/A';
                })
                ->addColumn('action', function ($section) {
                    return view('backend.home-section.action', compact('section'))->render();
                })
                ->addColumn('created_at', function ($section) {
                    return $section->created_at->format('M d, Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'Home Sections';
        return view('backend.home-section.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Home Section';

        return view('backend.home-section.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_key' => ['required', 'string', Rule::unique('home_sections')->whereNull('deleted_at'), 'regex:/^[a-z_]+$/'],
            'section_value' => 'nullable|string',
        ], [
            'section_key.regex' => 'Section key must contain only lowercase letters and underscores.',
        ]);

        HomeSection::create([
            'section_key' => $request->input('section_key'),
            'section_value' => $request->input('section_value'),
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Home section created successfully!'
            ]);
        }

        return redirect()->route('home-sections.index')
            ->with('success', 'Home section created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeSection $homeSection)
    {
        $title = 'View Home Section';

        return view('backend.home-section.show', compact('homeSection', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeSection $homeSection)
    {
        $title = 'Edit Home Section';

        return view('backend.home-section.edit', compact('homeSection', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeSection $homeSection)
    {
        $request->validate([
            'section_key' => ['required', 'string', Rule::unique('home_sections')->ignore($homeSection->id)->whereNull('deleted_at'), 'regex:/^[a-z_]+$/'],
            'section_value' => 'nullable|string',
        ], [
            'section_key.regex' => 'Section key must contain only lowercase letters and underscores.',
        ]);

        $homeSection->update([
            'section_key' => $request->input('section_key'),
            'section_value' => $request->input('section_value'),
            'updated_by' => auth()->id(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Home section updated successfully!'
            ]);
        }

        return redirect()->route('home-sections.index')
            ->with('success', 'Home section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeSection $homeSection)
    {
        $homeSection->deleted_by = auth()->id();
        $homeSection->save();
        $homeSection->delete();

        return redirect()->route('home-sections.index')
            ->with('success', 'Home section deleted successfully!');
    }
}
