<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = Category::withoutTrashed();
            return DataTables::of($categories)
                ->addColumn('status_badge', function ($category) {
                    $badge = $category->status ? 'success' : 'danger';
                    $icon = $category->status ? 'check-circle' : 'x-circle';
                    $text = $category->status ? 'Active' : 'Inactive';
                    return '<button type="button" class="btn btn-sm btn-light toggle-status" data-category-id="' . $category->id . '" style="cursor: pointer; padding: 0.25rem 0.5rem;" title="Click to toggle"><span class="badge bg-' . $badge . '"><i class="uil uil-' . $icon . '"></i> ' . $text . '</span></button>';
                })
                ->addColumn('action', function ($category) {
                    return view('backend.category.action', compact('category'))->render();
                })
                ->addColumn('created_at', function ($category) {
                    return $category->created_at->format('M d, Y');
                })
                ->rawColumns(['status_badge', 'action'])
                ->make(true);
        }

        $title = 'Categories';
        return view('backend.category.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Category';

        return view('backend.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'regex:/^[a-z0-9_-]*$/', Rule::unique('categories')->whereNull('deleted_at')],
            'category_status' => 'nullable|boolean',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'slug' => str_replace(' ', '_', $request->input('slug') ?: Str::slug($request->input('name'))),
            'status' => $request->has('category_status') ? true : false,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully!'
            ]);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $title = 'View Category';

        return view('backend.category.show', compact('category', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $title = 'Edit Category';

        return view('backend.category.edit', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'regex:/^[a-z0-9_-]*$/', Rule::unique('categories')->ignore($category->id)->whereNull('deleted_at')],
            'category_status' => 'nullable|boolean',
        ]);

        $category->update([
            'name' => $request->input('name'),
            'slug' => str_replace(' ', '_', $request->input('slug') ?: Str::slug($request->input('name'))),
            'status' => $request->has('category_status') ? true : false,
            'updated_by' => auth()->id(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully!'
            ]);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Check if category has any products
        if ($category->products()->withoutTrashed()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'Cannot delete category! Products exist under this category.');
        }

        $category->deleted_by = auth()->id();
        $category->save();
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }

    /**
     * Toggle category status
     */
    public function toggleStatus(Category $category)
    {
        $category->update([
            'status' => !$category->status,
            'updated_by' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'status' => $category->status,
            'message' => 'Status updated successfully!'
        ]);
    }
}
