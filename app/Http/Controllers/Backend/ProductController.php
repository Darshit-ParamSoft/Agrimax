<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Services\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            try {
                $query = Product::withoutTrashed()->orderBy('id', 'desc');

                return DataTables::of($query)
                    ->addColumn('category_name', function ($product) {
                        return $product->category ? $product->category->name : 'N/A';
                    })
                    ->addColumn('division_badge', function ($product) {
                        $badge = $product->division === 'agrimax' ? 'primary' : 'success';
                        return '<span class="badge bg-' . $badge . '">' . ucfirst($product->division) . '</span>';
                    })
                    ->addColumn('featured_badge', function ($product) {
                        return '<button type="button" class="toggle-featured" data-product-id="' . $product->id . '" style="cursor: pointer; font-size: 1.1rem; background: none; border: none;" title="Click to toggle"><i class="uil uil-star' . ($product->featured ? ' uil-star" style="color: #ffc107;' : '" style="color: #999;') . '" style="font-size: 1.3rem;"></i></button>';
                    })
                    ->addColumn('status_badge', function ($product) {
                        return '<button type="button" class="toggle-status" data-product-id="' . $product->id . '" style="cursor: pointer; font-size: 1.1rem; background: none; border: none;" title="Click to toggle"><i class="uil uil-eye' . ($product->status ? '" style="color: #28a745; font-size: 1.3rem;' : '-slash" style="color: #dc3545; font-size: 1.3rem;') . '"></i></button>';
                    })
                    ->addColumn('is_main_badge', function ($product) {
                        return '<button type="button" class="toggle-is-main" data-product-id="' . $product->id . '" style="cursor: pointer; font-size: 1.1rem; background: none; border: none;" title="Click to toggle"><i class="uil uil-toggle' . ($product->is_main ? '-on" style="color: #28a745; font-size: 1.3rem;' : '-off" style="color: #999; font-size: 1.3rem;') . '"></i></button>';
                    })
                    ->addColumn('action', function ($product) {
                        return view('backend.product.action', compact('product'))->render();
                    })
                    ->rawColumns(['division_badge', 'featured_badge', 'status_badge', 'is_main_badge', 'action'])
                    ->toJson();
            } catch (\Exception $e) {
                \Log::error('ProductController@index - ' . $e->getMessage());
                \Log::error($e->getTraceAsString());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $title = 'Products';
        return view('backend.product.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $title = 'Create Product';
        $product = null;

        return view('backend.product.form', compact('title', 'categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->whereNull('deleted_at'),
            ],
            'division' => 'required|in:agrimax,maxwell',
            'featured' => 'nullable|boolean',
            'product_status' => 'nullable|boolean',
            'is_main' => 'nullable|boolean',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'slug' => str_replace(' ', '_', $request->input('slug') ?: Str::slug($request->input('name'))),
            'short_description' => $request->input('short_description'),
            'long_description' => $request->input('long_description'),
            'category_id' => $request->input('category_id'),
            'division' => $request->input('division'),
            'featured' => $request->has('featured') ? true : false,
            'status' => $request->has('product_status') ? true : false,
            'is_main' => $request->has('is_main') ? true : false,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('product-images.edit', $product->id)
            ->with('success', 'Product created successfully! Now add images.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $title = 'View Product';

        return view('backend.product.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $title = 'Edit Product';

        return view('backend.product.form', compact('product', 'categories', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->whereNull('deleted_at'),
            ],
            'division' => 'required|in:agrimax,maxwell',
            'featured' => 'nullable|boolean',
            'product_status' => 'nullable|boolean',
            'is_main' => 'nullable|boolean',
        ]);

        $product->update([
            'name' => $request->input('name'),
            'slug' => str_replace(' ', '_', $request->input('slug') ?: Str::slug($request->input('name'))),
            'short_description' => $request->input('short_description'),
            'long_description' => $request->input('long_description'),
            'category_id' => $request->input('category_id'),
            'division' => $request->input('division'),
            'featured' => $request->has('featured') ? true : false,
            'status' => $request->has('product_status') ? true : false,
            'is_main' => $request->has('is_main') ? true : false,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('product-images.edit', $product->id)
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete all product images using ImageManager
        ImageManager::deleteByModel($product->id, Product::class);

        // Delete the product
        $product->deleted_by = auth()->id();
        $product->save();
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product and its images deleted successfully!');
    }

    /**
     * Toggle product status
     */
    public function toggleStatus(Product $product)
    {
        $product->update([
            'status' => !$product->status,
            'updated_by' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'status' => $product->status,
            'message' => 'Status updated successfully!'
        ]);
    }

    /**
     * Toggle product featured
     */
    public function toggleFeatured(Product $product)
    {
        $product->update([
            'featured' => !$product->featured,
            'updated_by' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'featured' => $product->featured,
            'message' => 'Featured status updated successfully!'
        ]);
    }

    /**
     * Toggle product is_main
     */
    public function toggleIsMain(Product $product)
    {
        $product->update([
            'is_main' => !$product->is_main,
            'updated_by' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'is_main' => $product->is_main,
            'message' => 'Main product status updated successfully!'
        ]);
    }
}
