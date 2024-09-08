@extends('admin.admin_master')

@section('admin')
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Bütün Kategoriler</h4>



                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Kategoriler</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Sıra</th>
                                        <th>Kategori Adı</th>
                                        <th>Resim</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>

                                    @php
                                    $s=1;
                                    @endphp

                                    @foreach($kategorihepsi as $kategoriler)
                                    <tbody>
                                    <tr>
                                        <td>{{$s++}}</td>
                                        <td>{{$kategoriler->kategori_adi}}</td>
                                        <td> <img src="{{asset($kategoriler->resim)}}" style="height:50px;width: 50px"></td>
                                        <td>İşlem</td>
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
