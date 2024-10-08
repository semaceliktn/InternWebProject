@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">İçerikler</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">İçerik Liste</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Başlık</th>
                                    <th>Kategori Adı</th>
                                    <th>Resim</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>

                                @foreach($blogicerik as $icerikler)
                                    <tbody>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{$icerikler->baslik }} </td>
                                        <!-- <td>{{ optional($icerikler->Altkategori)->altkategori_adi}}</td> -->
                                        <td><img src="{{ (!empty($icerikler->resim)) ? url($icerikler->resim): url('upload/EKLENMEDİ.jpg') }}" style="height:50px;width: 50px"></td>
                                        <td>
                                            <input type="checkbox" id="{{$icerikler->id}}" class="metinler" data-id="{{$icerikler->id}}" switch="success"{{$icerikler->durum ? 'checked' : ''}} }}>
                                            <label for="{{$icerikler->id}}" data-on-label="Yes" data-off-label="No"></label>
                                        </td>
                                        <td>
                                            <a href="{{route('blog.icerik.duzenle',$icerikler->id)}}" class="btn btn-info sm mt-2" title="Düzenle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('urun.sil',$icerikler->id)}}" class="btn btn-danger sm mt-2" title="Sil" id="sil" onclick="confirmation(event)">
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
