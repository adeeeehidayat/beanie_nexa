<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Silakan login terlebih dahulu.'], 401);
        }

        $user = Auth::user();
        $product = Product::findOrFail($productId);

        // Cek apakah stok mencukupi
        if ($product->stock <= 0) {
            return response()->json(['error' => 'Stok produk habis!'], 400);
        }

        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            // Jika stok cukup, tambah jumlah di keranjang dan kurangi stok
            if ($product->stock >= 1) {
                $cartItem->increment('quantity');
                $product->decrement('stock', 1);
            } else {
                return response()->json(['error' => 'Stok tidak mencukupi!'], 400);
            }
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
            $product->decrement('stock', 1);
        }

        return response()->json(['success' => 'Produk berhasil ditambahkan ke keranjang.']);
    }

    public function viewCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function removeFromCart($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);

        if ($cartItem->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus item ini.');
        }

        // Kembalikan stok produk yang dihapus dari keranjang
        $product = Product::find($cartItem->product_id);
        if ($product) {
            $product->increment('stock', $cartItem->quantity);
        }

        // Hapus item dari keranjang
        $cartItem->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang dan stok dikembalikan.');
    }
}

