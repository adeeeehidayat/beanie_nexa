<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan ada model Product

class ShopController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Tampilkan view shop dengan data produk
        return view('shop', compact('products'));
    }
}
