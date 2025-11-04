<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display the product showcase page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Load products from JSON file
        $jsonPath = public_path('data/products.json');
        $products = [];

        if (File::exists($jsonPath)) {
            $jsonContent = File::get($jsonPath);
            $products = json_decode($jsonContent, true);
        }

        return view('products', [
            'products' => $products
        ]);
    }
}
