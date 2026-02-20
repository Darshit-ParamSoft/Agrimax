<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show all products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.product.index');
    }

    /**
     * Show a single product.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        return view('frontend.product.show', ['id' => $id]);
    }

    /**
     * Show all other products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function otherProductsIndex()
    {
        return view('frontend.product.index');
    }

    /**
     * Show a single other product.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showOtherProduct($id)
    {
        return view('frontend.product.show', ['id' => $id]);
    }
}
