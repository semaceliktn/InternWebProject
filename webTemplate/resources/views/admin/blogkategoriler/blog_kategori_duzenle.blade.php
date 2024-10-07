@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> Blog Kategori Duzenle</h4>

                            <form method="post" action="{{ route('blog.kategori.guncelle.form') }}" class="mt-4 space-y-6">
                                @csrf

                                <input type="hidden" name="id" value="{{$BlogKategoriDuzenle->id}}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-form-label">Blog Kategori Adı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="kategori_adi" placeholder="Kategori Adı" id="example-text-input" value="{{$BlogKategoriDuzenle->kategori_adi}}">
                                        @error('kategori_adi')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-form-label">Sıra No</label>
                                    <div class="col-sm-10 form-group" >
                                        <input class="form-control" type="number" name="sirano" placeholder="Sıra No" value="{{ $BlogKategoriDuzenle->sirano }}" >
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-dark " value="Blog Kategori Güncelle">
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection
