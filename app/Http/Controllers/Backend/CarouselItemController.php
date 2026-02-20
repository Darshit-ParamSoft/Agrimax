<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use App\Models\Product;
use App\Services\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarouselItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $title = 'Homepage Product Carousel';
            $carouselItems = CarouselItem::with('product')
                ->withoutTrashed()
                ->orderBy('sort_order', 'asc')
                ->get();

            return view('backend.carousel.index', compact('title', 'carouselItems'));
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@index - ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return back()->with('error', 'Error loading carousel items');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $title = 'Add Carousel Item';
            $products = Product::withoutTrashed()->get();
            $carouselItem = null;

            return view('backend.carousel.form', compact('title', 'products', 'carouselItem'));
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@create - ' . $e->getMessage());
            return back()->with('error', 'Error loading create form');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => [
                    'required',
                    Rule::unique('carousel_items', 'product_id')->whereNull('deleted_at'),
                    Rule::exists('products', 'id')->whereNull('deleted_at'),
                ],
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'product_carousel_status' => 'nullable|boolean',
            ]);

            $maxSortOrder = CarouselItem::withoutTrashed()
                ->max('sort_order') ?? 0;

            $carouselItem = CarouselItem::create([
                'product_id' => $request->input('product_id'),
                'sort_order' => $maxSortOrder + 1,
                'status' => $request->has('product_carousel_status') ? true : false,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);

            // Upload image using ImageManager
            if ($request->hasFile('image')) {
                ImageManager::upload(
                    $request->file('image'),
                    'carousel',
                    $carouselItem->id,
                    CarouselItem::class,
                    'carousel'
                );
            }

            return redirect()->route('carousel.index')
                ->with('success', 'Carousel item created successfully');
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@store - ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarouselItem $carousel)
    {
        try {
            $title = 'Edit Carousel Item';
            $products = Product::withoutTrashed()->get();
            $carouselItem = $carousel;

            return view('backend.carousel.form', compact('title', 'products', 'carouselItem'));
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@edit - ' . $e->getMessage());
            return back()->with('error', 'Error loading edit form');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarouselItem $carousel)
    {
        try {
            $request->validate([
                'product_id' => [
                    'required',
                    Rule::unique('carousel_items', 'product_id')
                        ->ignore($carousel->id)
                        ->whereNull('deleted_at'),
                    Rule::exists('products', 'id')->whereNull('deleted_at'),
                ],
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'product_carousel_status' => 'nullable|boolean',
            ]);

            $carousel->update([
                'product_id' => $request->input('product_id'),
                'status' => $request->has('product_carousel_status') ? true : false,
                'updated_by' => auth()->id(),
            ]);

            // Update image using ImageManager
            if ($request->hasFile('image')) {
                // Delete old image
                $carousel->imageFiles()->delete();
                // Upload new image
                ImageManager::upload(
                    $request->file('image'),
                    'carousel',
                    $carousel->id,
                    CarouselItem::class,
                    'carousel'
                );
            }

            return redirect()->route('carousel.index')
                ->with('success', 'Carousel item updated successfully');
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@update - ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(CarouselItem $carousel)
    {
        try {
            // Delete image using ImageManager
            ImageManager::deleteByModel($carousel->id, CarouselItem::class);

            $carousel->deleted_by = auth()->id();
            $carousel->save();
            $carousel->delete();

            return redirect()->route('carousel.index')
                ->with('success', 'Carousel item deleted successfully');
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@destroy - ' . $e->getMessage());
            return back()->with('error', 'Error deleting carousel item');
        }
    }

    /**
     * Update sort order via drag and drop.
     */
    public function updateSortOrder(Request $request)
    {
        try {
            $sortOrder = $request->input('sort_order', []);

            foreach ($sortOrder as $index => $itemId) {
                CarouselItem::where('id', $itemId)
                    ->update([
                        'sort_order' => $index + 1,
                        'updated_by' => auth()->id(),
                    ]);
            }

            return response()->json(['success' => true, 'message' => 'Sort order updated']);
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@updateSortOrder - ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Toggle status.
     */
    public function toggleStatus(Request $request, CarouselItem $carousel)
    {
        try {
            $carousel->status = !$carousel->status;
            $carousel->updated_by = auth()->id();
            $carousel->save();

            return response()->json([
                'success' => true,
                'status' => $carousel->status,
                'message' => 'Status updated successfully',
            ]);
        } catch (\Exception $e) {
            \Log::error('CarouselItemController@toggleStatus - ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
