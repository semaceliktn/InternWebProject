@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Alt kategori Ekle</h4>

                            <form method="post" action="{{ route('altkategori.ekle.form') }}" class="mt-4 space-y-6" enctype="multipart/form-data" id="myForm">
                                @csrf


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori seç</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="kategori_id">
                                            <option selected="">Kategori seç</option>
                                            @foreach($kategori_goster as $kategoriler)
                                            <option value="{{ $kategoriler->id }}">{{ $kategoriler->kategori_adi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Alt kategori Adı</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" type="text" name="altkategori_adi" placeholder="Alt Kategori Adı" >
                                        @error('altkategori_adi')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                    <div class="col-sm-10 form-group" >
                                        <input class="form-control" type="text" name="anahtar" placeholder="Anahtar" >
                                        @error('anahtar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" type="text" name="aciklama" placeholder="Açıklama" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Resim</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" type="file" name="resim" placeholder="Resim" id="resim">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 "></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" src=" {{ url('upload/EKLENMEDİ.jpg') }} " alt="" id="resimGoster">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-dark " value="Alt kategori Ekle">
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

    <!-- Boş olamaz validate -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myForm").validate({
                rules:{
                    altkategori_adi:
                        {
                            required:true,
                        },
                    anahtar:
                        {
                            required:true,
                        },
                    aciklama:
                        {
                            required:true,
                        },
                }, //end rules
                messages:{
                    altkategori_adi:
                        {
                            required:'Alt kategori adı giriniz.',
                        },
                    anahtar:
                        {
                            required:'Anahtar giriniz.',
                        },
                    aciklama:
                        {
                            required:'Açıklama giriniz',
                        },
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


@endsection
