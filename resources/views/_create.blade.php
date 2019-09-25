<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf    
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid  @enderror" value="{{ old('title') ? old('title') : $faker->sentence}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" cols="30" rows="5" class="form-control @error('content') is-invalid  @enderror" >{{ old('content') ? old('content') : $faker->text($maxNbChars = 200)}}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="alert"></div>
                            <img class="img-fluid" id="preview" src="" alt="image" title=''>
                        </div>
    
                        <div class="form-group"> 
                            <div class="custom-file">
                                <input type="file" name="image" id="inputGroupFile01" class="imgInp custom-file-input @error('image') is-invalid  @enderror" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control @error('category') is-invalid  @enderror" value="{{ old('category') ? old('category') : $faker->sentence}}">
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
            $('#preview').hide();
            $("#inputGroupFile01").change(function(event) {  
                RecurFadeIn();
                readURL(this);
            });
            $("#inputGroupFile01").on('click',function(event) {
                RecurFadeIn();
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    var filename = $("#inputGroupFile01").val();
                    filename = filename.substring(filename.lastIndexOf('\\')+1);
                    reader.onload = function(e) {
                        debugger;
                        $('#preview').attr('src', e.target.result);
                        $('#preview').hide();
                        $('#preview').fadeIn(500);
                        $('.custom-file-label').text(filename);
                    }
                    reader.readAsDataURL(input.files[0]);
                } 
                $(".alert").removeClass("loading").hide();
            }
            function RecurFadeIn(){
                FadeInAlert("Wait for it...");
            }
            function FadeInAlert(text){
                $(".alert").show();
                $(".alert").text(text).addClass("loading");
            }
        </script>
    @endpush