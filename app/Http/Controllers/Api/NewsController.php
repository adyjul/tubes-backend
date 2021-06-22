<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;
use App\Models\news;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::all();
        return response([
            'total' => $news->count(),
            'messages' => 'Retrieved successfuly',
            'data' => NewsResource::collection($news)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penulis' => 'max:255',
            'deskripsi' => 'max:225',
            'judul' => 'max:225',
            'gambar' => 'max:100',
            'tanggal' => 'max:100',


        ]);
        if ($validator -> fails()) {
            return response([
                'error' => $validator->errors(),
                'status' => 'Validation Error'
            ]);
        }
        $news = news::create($request->all());
        return response([
            'data' => new NewsResource($news),
            'message' => 'Data has been created!'
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = news::find($id);
        if ($news != null) {
            return response([
                'project' => new NewsResource($news),
                'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
        
    //     $validator = Validator::make($request->all(), [
    //         'nama_product' => 'max:255',
    //         'harga' => 'max:10',
    //     ]);
    //     if ($validator -> fails()) {
    //         return response([
    //             'error' => $validator->errors(),
    //             'status' => 'Validation Error'
    //         ]);
    //     }
    //     $product = product::find($id);
    //     if ($product != null){
    //         $product->update($request->all());
    //         return response([
    //             'data' => new ProductResource($product),
    //             'message' => 'Adidas has been updated!'], 202);
    //     } else {
    //         return response([
    //             'message'=>'No data found!',], 403);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = news::find($id);
        if($news != null) {
            $news->delete();
            return response([
                'message' => 'Data has been deleted!']);
        } else {
            return response([
                'message' => 'No data found!',], 403);
        }
    }
}
