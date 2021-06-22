<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
{
   return [
     'id' => $this->id,
     'penulis' => $this->penulis,
     'judul' => $this->judul,
     'deskripsi' => $this->deskripsi,
     'gambar' => $this->gambar,
     'tanggal' => $this->tanggal,
  ];
}
}
