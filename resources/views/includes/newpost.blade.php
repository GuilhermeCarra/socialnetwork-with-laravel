<div id="newpost" class="newpost d-flex flex-column justify-content-center align-items-center">
    <div class="newpost-form">
        <div class="newpost-close text-white">
            <i class="ri-close-circle-line text-white"></i>
        </div>
        <form action="" method="POST" id="newpost-form">
            <h3 class="text-light">New Post</h3>
            @csrf
            <div class="form-group text-light">
                <label for="textarea-newpost-content">What are you thinking? </label>
                <textarea class="form-control shadow" name="post_content" id="textarea-newpost-content" cols="30" rows="10"></textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="post_image" id="post_image">
                <label class="custom-file-label" for="post_image" accept="image/x-png,image/gif,image/jpeg">Choose file</label>
              </div>
            <div class="form-group mt-4">
                <input type="submit" value="Post" class="btn btn-primary text-white shadow">
            </div>
        </form>
    </div>
</div>