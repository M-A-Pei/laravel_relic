@extends('dashboard.layout.main')

@section('container')
    <h1>Create Post</h1>

    <div class="col-lg-7">
    <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" placeholder="Title" required>

          @error("title")
          <div class="invalid-feedback"> {{ $message }} </div>
          @enderror

        </div>

        <div class="mb-3">
          <label for="category" class="form-label d-block">Category</label>
          <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
            <option>pick a category</option>
             @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
             @endforeach
          </select>

          @error('category_id')
          <div class="invalid-feedback"> {{ $message }} </div>
          @enderror

        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="exampleFormControlTextarea1" rows="15" required></textarea>
            @error('body')
            <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Post image</label>
          <img class="img-preview img-fluid col-sm-4 d-block mb-2" id="previewImg" alt="">
          <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="preview()">

          @error('image')
            <div class="invalid-feedback"> {{ $message }} </div>
          @enderror

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
@endsection

<script>
  function preview(){
  const imagePreview = document.querySelector('#previewImg');
  const image = document.querySelector('#image');

  const blob = URL.createObjectURL(image.files[0]);
  imagePreview.src = blob;
  }
</script>