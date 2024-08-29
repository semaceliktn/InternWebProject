@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Banner Düzenle</h4>

                            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                             @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Artisanal kale" id="example-text-input" value="{{$homebanner->baslik}}">
                                </div>
                            </div>
                            <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Alt Başlık</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Artisanal kale" id="example-text-input" value="{{$homebanner->alt_baslik}}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Url</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Artisanal kale" id="example-text-input" value="{{$homebanner->url}}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Artisanal kale" id="example-text-input" value="{{$homebanner->video_url}}">
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 ">Resim</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="resim" id="resim">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 "></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" src=" {{ (!empty( $homebanner->resim )) ? url('upload/banner/'.$homebanner->resim)
                                         : url('upload/EKLENMEDİ.jpg') }} " alt="" id="resimGoster">
                                    </div>
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
