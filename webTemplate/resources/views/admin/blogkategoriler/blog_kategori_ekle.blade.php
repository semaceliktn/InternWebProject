@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Blog Kategori Ekle</h4>

                            <form method="post" action="{{ route('blog.kategori.form') }}" class="mt-4 space-y-6" enctype="multipart/form-data" id="myForm">
                                @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Kategori Adı</label>
                                            <div class="col-sm-12 form-group" >
                                                <input class="form-control" type="text" name="kategori_adi" placeholder="Kategori Adı">
                                                @error('kategori_adi')
                                                <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                                <label for="example-text-input" class="col-form-label">Sıra No</label>
                                                <div class="col-sm-12 form-group" >
                                                    <input class="form-control" type="number" name="sirano" placeholder="Sıra No" value="1" >
                                                </div>
                                        </div>
                                            <!-- end row -->
                                        <div class="d-flex justify-content-center">
                                            <input type="submit" class="btn btn-dark " value="Blog Kategori Ekle">
                                        </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <!-- Boş olamaz validate -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myForm").validate({
                rules:{
                    kategori_adi:
                        {
                            required:true,
                        },
                    sirano:{
                        required:true,
                    }
                }, //end rules
                messages:{
                    kategori_adi:
                        {
                            required:'Kategori adı boş olamaz.',
                        },
                    sirano:{
                        required:'Sıra no giriniz.',
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
