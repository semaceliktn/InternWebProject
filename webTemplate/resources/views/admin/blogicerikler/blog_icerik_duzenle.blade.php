@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>



<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 3px;
        font-weight: 700;
        color: #228b22!important;
    }
</style>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">İçerik Düzenle</h4>

                            <form method="post" action="{{ route('blog.icerik.guncelle.form') }}" class="mt-4 space-y-6" enctype="multipart/form-data" id="myForm">
                                @csrf

                                <input type="hidden" name="id" value="{{$blogicerik->id}}">
                                <input type="hidden" name="onceki_resim" value="{{$blogicerik->resim}}">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-form-label">Başlık</label>
                                                <div class="col-sm-12 form-group" >
                                                    <input class="form-control" type="text" name="baslik" placeholder="Başlık" value="{{ $blogicerik->baslik }}" >
                                                    @error('baslik')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-form-label">Tag</label>
                                                <div class="col-sm-12 form-group" >
                                                    <input class="form-control" type="text" name="tag" data-role="tagsinput" value="{{ $blogicerik->tag }}">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <div class="col-sm-12 form-group" >
                                                    <label for="example-text-input" class="col-form-label">Metin</label>
                                                    <textarea id="editor" name="metin" type="text">value="{{ $blogicerik->metin }}</textarea>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div> <!--col-md-8 bitti-->

                                        <div class="col-md-4">
                                            <div class="row mb-3">
                                                <label class="col-form-label">Kategori seç</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                                                        <option selected="">Kategori seç</option>
                                                        @foreach($kategoriler as $kategori)
                                                            <option value="{{ $kategori->id }}" {{$kategori->id == $blogicerik->kategori_id ? 'selected' : ''}}>{{$kategori->kategori_adi}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-form-label">Sıra No</label>
                                                <div class="col-sm-12 form-group" >
                                                    <input class="form-control" type="number" name="sirano" placeholder="Sıra No" value="{{ $blogicerik->sirano }}" >
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-form-label">Resim</label>
                                                <div class="col-sm-12 form-group">
                                                    <input class="form-control" type="file" name="resim" placeholder="Resim" id="resim">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-text-input"></label>
                                                <div class="col-sm-12">
                                                    <img class="rounded avatar-lg" src=" {{ (!empty($blogicerik->resim) ? url($blogicerik->resim) : url('upload/EKLENMEDİ.jpg')) }} " alt="" id="resimGoster">
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-form-label">Anahtar</label>
                                                <div class="col-sm-12 form-group" >
                                                    <input class="form-control" type="text" name="anahtar" placeholder="Anahtar" value="{{ $blogicerik->anahtar }}" >
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-form-label">Açıklama</label>
                                                <div class="col-sm-12 form-group">
                                                    <input class="form-control" type="text" name="aciklama" placeholder="Açıklama" value="{{ $blogicerik->aciklama }}" >
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div> <!-- col-md-4 bitti -->
                                        <div class="d-flex justify-content-center">
                                            <input type="submit" class="btn btn-dark " value="Blog İçerik Güncelleme">
                                        </div>
                                    </div>
                                </div>  <!-- col-md-12 bitti -->
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

    <!-- Boş olamaz validate -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myForm").validate({
                rules:{
                    kategori_id:
                        {
                            required:true,
                        },
                    sirano:{
                        required:true,
                    }
                }, //end rules
                messages:{
                    kategori_id:
                        {
                            required:'Kategori boş olamaz.',
                        },
                    sirano:{
                        required:'Sıra numarası giriniz.',
                    }
                },
                <!-- end message -->

                errorElement : 'span',
                errorPlacement: function (error,element){
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },

                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },

                unhighlight : function (element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },

            });
        });
    </script>
    <!-- Boş olamaz validate -->

    <!--ckeditor-->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <!--ckeditor-->

@endsection
