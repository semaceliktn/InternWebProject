<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                 <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 ">Resim</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" placeholder="bootstrap@example.com" id="resim">
                    </div>
                 </div>

                 <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 "></label>
                    <div class="col-sm-10">
                        <img class="rounded avatar-lg" src="" alt="" id="resimGoster">
                    </div>
                 </div>
                 <input type="submit" class="btn  btn-dark" value="Update Image" >
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
     $('#resim').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#resimgoster').attr( 'src',e.target .result);
        }
        reader.readAsDataURL(e.target.files['0']);
     });
    });

</script>


