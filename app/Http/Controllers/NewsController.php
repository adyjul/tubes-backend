<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

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
        return view('admin', compact('news'));
        
    }

    public function load_image($name_file)
    {
        $gambar = array(
            'gambar' => $name_file
        );
        return view('image', $gambar);
        //echo 'hei';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $file = $request->file('gambar');
        news::create([
            'penulis' => $request->penulis,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,            
            'gambar' => $file->getClientOriginalName(),
            'tanggal' => $request->tanggal,
        ]);

        // Authors::create($request->all());
        return redirect('admin');
        //return redirect()->view('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = news::findOrFail($id);
        return view('edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('gambar');
        news::findOrFail($id)->update([
            'penulis' => $request->penulis,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,            
            'gambar' => $file->getClientOriginalName(),
            'tanggal' => $request->tanggal,
        ]);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        news::findOrFail($id)->delete();
        return redirect('admin');
    }
}
