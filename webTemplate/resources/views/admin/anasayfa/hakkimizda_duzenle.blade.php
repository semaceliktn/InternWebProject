@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hakkımızda Düzenle</h4>

                            <form method="post" action="{{ route('hakkimizda.guncelle') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $hakkimizda->id }}">
                                <input type="hidden" name="onceki_resim" value="{{ $hakkimizda->resim }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="baslik" placeholder="Başlık" id="example-text-input" value="{{$hakkimizda->baslik}}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Kısa Başlık</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="kisa_baslik" placeholder="Kısa Başlık" id="example-text-input" value="{{$hakkimizda->kisa_baslik}}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Kısa Açıklama</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" type="text" name="kisa_aciklama" placeholder="Kısa Açıklama" id="example-text-input">{{$hakkimizda->kisa_aciklama}}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="editor" type="text" name="aciklama" placeholder="Açıklama">{{$hakkimizda->aciklama}}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 ">Resim</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="resim" id="resim" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 "></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" src=" {{ (!empty( $hakkimizda->resim )) ? url($hakkimizda->resim)
                                         : url('upload/EKLENMEDİ.jpg') }} " alt="" id="resimGoster">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-dark " value="Hakkımızda Güncelle">
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

    <!--ckeditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <!--ckeditor-->

@endsection
