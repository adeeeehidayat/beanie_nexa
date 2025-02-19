<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        $products = Product::latest()->get();

        return view('welcome', compact('articles', 'products'));
    }
}

