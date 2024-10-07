@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Kategoriler</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Blog Liste</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Kategori Adı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>

                                @foreach($blogliste as $bloglar)
                                    <tbody>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bloglar->kategori_adi}}</td>
                                        <td>
                                            <input type="checkbox" id="{{$bloglar->id}}" class="icerikler" data-id="{{$bloglar->id}}" switch="success"{{$bloglar->durum ? 'checked' : ''}} }}>
                                            <label for="{{$bloglar->id}}" data-on-label="Yes" data-off-label="No"></label>
                                        </td>
                                        <td>
                                            <a href="{{route('blog.kategori.duzenle',$bloglar->id)}}" class="btn btn-info sm mt-2" title="Düzenle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('blog.kategori.sil',$bloglar->id)}}" class="btn btn-danger sm mt-2" title="Sil" id="sil" onclick="confirmation(event)">
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
