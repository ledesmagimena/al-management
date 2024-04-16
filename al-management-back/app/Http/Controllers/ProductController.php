<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAll()
    {
        return Product::all();
    }
    public function store(Request $request)
    {
        $product = Product::create($request->toArray()); 
    }

    public function getById($id)
    {
        $product = Product::find($id);
        if(isset($product)){
            return response()->json([
                'data'=>$product,
                'message'=>'Producto encontrado.'
            ]);
        }else{
            return response()->json([
               'message'=>'Producto no encontrado.'
            ],404);
        }
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $product = Product::find($id);
        if($request['name'] || $request['description']){
            return response()->json([
                'message' => 'No puedes editar estos campos.'
            ], 401);
            
        } 
            $product->update($request->toArray());
            DB::commit();
            return $product;
    }

    public function delete($id)
    {
        Product::destroy($id);
    }
   
}
