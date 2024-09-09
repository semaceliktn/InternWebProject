@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Kategori Duzenle</h4>

                            <form method="post" action="{{ route('kategori.guncelle.form') }}" class="mt-4 space-y-6" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$kategoriduzenle->id}}">
                                <input type="hidden" name="onceki_resim" value="{{$kategoriduzenle->resim}}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Adı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="kategori_adi" placeholder="Kategori Adı" id="example-text-input" value="{{$kategoriduzenle->kategori_id}}">
                                        @error('kategori_adi')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="anahtar" placeholder="Anahtar" id="example-text-input" value="{{$kategoriduzenle->anahtar}}">
                                        @error('anahtar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="aciklama" placeholder="Açıklama" id="example-text-input" value="{{$kategoriduzenle->aciklama}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Resim</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="resim" placeholder="Resim" id="resim">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 "></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" src=" {{ (!empty($kategoriduzenle->resim)) ? url($kategoriduzenle->resim) : url('upload/EKLENMEDİ.jpg') }} " alt="" id="resimGoster">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-dark " value="Kategori Güncelle">
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#resim').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#resimGoster').attr( 'src',e.target .result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>

@endsection
