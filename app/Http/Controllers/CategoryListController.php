<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class CategoryListController extends Controller
{
    /**
     * Storefront page listing every active category; each links to the shop filtered by it.
     */
    public function index(): View
    {
        // Categories and sub-categories with products, in menu order.
        $categories = Catalog::menu()['categories'];

        return view('categories', compact('categories'));
    }
}
