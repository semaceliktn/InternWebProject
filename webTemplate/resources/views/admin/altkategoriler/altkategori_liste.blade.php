@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Alt Kategoriler</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Alt Kategoriler</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Kategori Adı</th>
                                    <th>Alt Kategori Adı</th>
                                    <th>Resim</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>

                                @php
                                    $s=1;
                                @endphp

                                @foreach($altkategoriler as $altkategori)
                                    <tbody>
                                    <tr>
                                        <td>{{$s++}}</td>
                                        <td> {{ $altkategori['iliskiCategory']['kategori_adi'] }} </td>
                                        <td>{{$altkategori->altkategori_adi}}</td>
                                        <td> <img src="{{(!empty($altkategori->resim)) ? url($altkategori->resim) : url('upload/EKLENMEDİ.jpg')}}" style="height:50px;width: 50px"></td>
                                        <td>
                                            <a href="{{route('kategori.duzenle',$altkategori->id)}}" class="btn btn-info sm mt-2" title="Düzenle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('kategori.sil',$altkategori->id)}}" class="btn btn-danger sm mt-2" title="Sil" id="sil" onclick="confirmation(event)">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>

@endsection
