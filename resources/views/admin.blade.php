@extends('template/layout')

@section('title','dashboard')


@section('content')
<div class="container-fluid">
	
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Tambah data</button>

<table class="table mt-2">  
 <tr>   
   <th>No.</th>
   <th>penulis</th> 
   <th>Judul</th> 
   <th>Deskripsi</th>
   <th>Gambar</th>   
   <th>tanggal</th>
   <th>Aksi</th>
 </tr>


 <tr>
  <?php $count = 0; ?>
  @foreach ($news as $a)
  <?php $count++; ?>

   <th>{{$count}}</th>
   
   <th>{{$a->penulis}}</th>
   <th>{{$a->judul}}</th>
   <th>{{$a->deskripsi}}</th>     
   <th><a href={{"gambar/".$a->gambar}}>lihat gambar</a></th>
   <th>{{$a->tanggal}}</th>
   <th><a  href="{{"hapus/".$a->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash "></i></a></th>
   <th>
    <a href="{{"edit/".$a->id}}"href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>edit</a>     
   <th>
      
   </th>
   <th onClick="javacript : return confirm('hapus?')" >
    
   </th>
   <th>
     
   </th>
  </tr>
  @endforeach  

</table>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
         <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
          @CSRF
             <div class="form-group">
               <label>Penulis</label>
               <input type="text" name="penulis" class="form-control " required>
           </div>
           <div class="form-group">
               <label>Deskripsi</label>
               <input type="text" name="deskripsi" class="form-control" required>
           </div>
           <div class="form-group">
               <label>Judul</label>
               <input type="text" name="judul" class="form-control" required>
           </div>
           <div class="form-group">
            <label>Picture</label>
            <input type="file" name="gambar" class="form-control"  required>
            
           </div>
           <div class="form-group">
               <label>Tanggal</label>
               <input type="text" name="tanggal" class="form-control" required>
           </div>                                       
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
         </form>
     </div>
   </div>
 </div>

</div>

</div>

@endsection



