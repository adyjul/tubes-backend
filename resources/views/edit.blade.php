
@extends('template.layout')

@section('title','edit')


@section('content')


<div class="container-fluid">
    <form method="post" action="{{route('admin.update',[$news->id])}}" enctype="multipart/form-data">
        @CSRF
        @method('put')
           <div class="form-group">
               <label>Penulis</label>
               <input type="text" name="penulis" class="form-control" value="{{$news->penulis}}" required>
           </div>
           <div class="form-group">
               <label>Judul</label>
               <input type="text" name="judul" class="form-control" value="{{$news->judul}}" required>
           </div>
           <div class="form-group">
               <label>Deskripsi</label>
               <input type="text" name="deskripsi" class="form-control" value="{{$news->deskripsi}}" required>
           </div>
           <div class="form-group">
            <label>Picture</label>
            <input type="file" name="gambar" class="form-control" value="{{$news->gambar}}" required>
           </div>
           <div class="form-group">
               <label>Tanggal</label>
               <input type="text" name="tanggal" class="form-control" value="{{$news->tanggal}}" required>
           </div>                                       
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
       </form>
</div>



@endsection



