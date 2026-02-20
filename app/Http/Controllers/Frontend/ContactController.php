<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();
        return view('frontend.contact.index', compact('products'));
    }

    /**
     * Submit contact form.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'form_name' => 'required|string|max:255',
                'form_phone' => 'required|numeric|digits_between:1,20',
                'form_email' => 'required|email|max:255',
                'product' => 'required|exists:products,id',
                'form_message' => 'nullable|string',
            ]);

            Enquiry::create([
                'name' => $request->input('form_name'),
                'phone' => $request->input('form_phone'),
                'email' => $request->input('form_email'),
                'product_id' => $request->input('product'),
                'message' => $request->input('form_message', ''),
            ]);

            if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json(['success' => true, 'message' => 'Thank you for your inquiry. We will get back to you soon!']);
            }

            return back()->with('success', 'Thank you for your inquiry. We will get back to you soon!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            \Log::error('ContactController@store - ' . $e->getMessage() . ' - ' . $e->getFile() . ':' . $e->getLine());
            \Log::error('ContactController@store Stack: ' . $e->getTraceAsString());

            if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'message' => 'Error submitting inquiry: ' . $e->getMessage()
                ], 500);
            }

            return back()
                ->withInput()
                ->with('error', 'Error submitting inquiry: ' . $e->getMessage());
        }
    }
}
