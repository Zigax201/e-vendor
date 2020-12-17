<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = Product::find($id);
            return ($product) ? ResponseFormatter::success($product) : ResponseFormatter::error(null, "Product Not Found", 404);
        }

        $product = Product::query();

        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }

        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }
        if ($price_to) {
            $product->where('price', '<=', $price_to);
        }

        if ($rate_from) {
            $product->where('rating', '>=', $rate_from);
        }
        if ($rate_to) {
            $product->where('rating', '<=', $rate_to);
        }

        return ResponseFormatter::success($product->paginate($limit), "product fetched");
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required','string','max:255'],
                'description' => ['required', 'string'],
                'image' => ['required', 'file', 'image', 'max:2048'],
                'price' => ['required'],
                'rating' => ['required'],
                'quantity' => ['required'],
                'sold' => ['required']
            ]);

            $req = $request->all();
            $req['image_url'] = $request->file('image')->store('assets/products', 'public');

            $product = Product::create([
                'name' => $req['name'],
                'description' => $req['description'],
                'image_url' => $req['image_url'],
                'price' => $req['price'],
                'rating' => $req['rating'],
                'quantity' => $req['quantity'],
                'sold' => $req['sold']
            ]);

            return ResponseFormatter::success($product);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Create Product Failed', 500);
        }
    }

    public function delete($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return ResponseFormatter::success($product, "product deleted");
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Delete Product Failed', 500);
        }
    }
}
