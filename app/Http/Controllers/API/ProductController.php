<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Post;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        Products::create($request->all());
        return response()->json(['message' => 'Produk berhasil disimpan'], 201);
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json(['message' => 'Produk berhasil diupdate'], 200);
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }

    // public function search(Request $request){
    //     $search = $request->search;

    //     $posts =Products::where(function ($query) use ($search){

    //         $query->where('title','like',"%$search%")
    //         ->orWhere('description','like',"%$search%");
    //     })
    //         ->orWhereHas('category',function($query) use($search){
    //         $query->where('name', 'like', "%$search%");
    //     })
    //         ->orWhereHas('user',function($query) use($search){
    //         $query->where('name','like',"%$search%");
    //     })
    //         ->get();

    //     return view('index',compact('posts', 'search'));
    // }

}
