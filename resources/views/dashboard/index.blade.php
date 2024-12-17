@extends('layouts.main')

@section('css')
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pendaftar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pendaftar</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
              	<div class="col-sm-6 pt-2">
              		<h3 class="card-title">List Data Pendaftar Waiting</h3>
              	</div>
              	<div class="col-sm-6" align="right">
              		<a href="{{url('pendaftar_export')}}" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Data</a>
              	</div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($message=Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <div class="alert-text">{{ucwords($message)}}</div>
                    </div>
               @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name & No Invoice</th>
                  <th>Email & WA</th>
                  <th>City & PC & Grup</th>
                  <th>Occupation & NPA PERDOSKI</th>
                  <th>PRICE</th>
                  <th>Status</th>
                  <th>Proof</th>
                  <th>Tgl & Waktu Pendaftaran</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $item)
                <tr>
                   @include('pendaftar.modal')
                  <td>{{$key+1}}</td>
                  <td>Nama : {{$item->nama}} <br> No : {{$item->kode}}</td>
                  <td>Email : {{$item->email}}<br>WA : {{$item->wa}}</td>
                  <td>{{$item->city}}<br> PC :{{$item->pc}} <br>Grup : <b>{{$item->grup}}</b></td>
                  <td>Occupation : {{$item->occupation}} <br> NPA PERDOSKI : {{$item->IDI}}</td>
                  <td>$item->price</td>
                  <td> 
                    @if($item->status == 'waiting')
                       <span style="color:orange;text-transform: uppercase; font-weight:bold"> Menunggu Pembayaran </span>
                     @elseif($item->status == 'approve')
                        <span style="color:green;text-transform: uppercase; font-weight:bold">Lunas</span>
                     @elseif($item->status == 'pending')
                        <span style="color:orange;text-transform: uppercase; font-weight:bold">Pending</span>
                     @else
                        <span style="color:red;text-transform: uppercase; font-weight:bold">Cancel  </span>
                     @endif</td>
                  <td>
                    @if($item->status == 'waiting')
                    <button class="btn btn-danger btn-sm" style="color: black;"><i class="fa fa-close"></i> Belum Upload</button>
                    @else
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalSoal{{$item->id}}" style="color: black;"><i class="fa fa-eye"></i> Lihat</button>
                    <br>
                    Nama Rekening Pengirim : {{$item->nama_rek}}
                    
                    @endif
                  </td>
                  <td>{{$item->created_at}}</td>
                  <td>
                    @if($item->status == 'pending')
                  	<a  href="{{url('pendaftaran_status/approve/'.$item->id)}}" 
                  	    style="color: black;" 
                        onclick="return confirm('Yakin untuk menyetujui data?')"
                  	    class="fa fa-check btn btn-success btn-sm"> 
                  		Setujui
                  	</a> &nbsp;
                    &nbsp;
                    <a  href="{{url('pendaftaran_status/cancel/'.$item->id)}}" 
                      style="color: black;" 
                        class="fa fa-close btn-danger btn-sm"  
                        onclick="return confirm('Yakin untuk meng cancel data?')"> 
                      Cancel
                    </a>
                    @elseif($item->status == 'approve')
                    &nbsp;
                    <a  href="{{url('pendaftaran_status/cancel/'.$item->id)}}" 
                      style="color: black;" 
                        class="fa fa-close btn-danger btn-sm"  
                        onclick="return confirm('Yakin untuk meng cancel data?')"> 
                      Cancel
                    </a>
                    @elseif($item->status == 'cancel')
                    <a  href="{{url('pendaftaran_status/approve/'.$item->id)}}" 
                        style="color: black;" 
                        onclick="return confirm('Yakin untuk menyetujui data?')"
                        class="fa fa-check btn btn-success btn-sm"> 
                      Setujui
                    </a> &nbsp;
                    @endif
                    <a  href="{{url('pendaftar/delete/'.$item->id)}}" 
                        style="color: black;" 
                        onclick="return confirm('Yakin untuk menghapus data?')"
                        class="fa fa-trash btn btn-danger btn-sm"> 
                      Hapus
                    </a> &nbsp;
                  </td>
                </tr>    
                @endforeach   
                </tbody>         
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
<script src="{{url('dist/js/pages/dashboard2.js')}}"></script>
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
	  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection