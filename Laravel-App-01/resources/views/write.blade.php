@extends('layouts.skeleton')

@section('skeleton')
  <form class="form-add" action="{{route('write.store')}}" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="text-center mb-4">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Write</h1>
    </div>

    <div class="form-label-group">
      <input value="{{old("title")}}" type="text" id="inputTitle" class="form-control" name='title' placeholder="Your Blog Title" required autofocus>
      <label for="inputTitle">Title</label>
      <div id="email-feedback" class="invalidfeedback">
        @error('title') {{$message}} @enderror
      </div>
    </div>

    <div class="form-label-group">
      <input value="{{old("intro")}}" type="text" id="inputintro" class="form-control" name='intro' placeholder="Your blog description here" required autocomplete="address-line3" autofocus>
      <label for="inputintro">description</label>
      <div id="email-feedback" class="invalidfeedback">
        @error('intro') {{$message}} @enderror
      </div>
    </div>

    <div class="form-label-group">
      <input value="{{old("post_img")}}" type="text" id="inputimage" class="form-control" name='post_img' placeholder="Your blog poster goes here" required >
      <label for="inputimage">Blog Poster</label>
      <div id="email-feedback" class="invalidfeedback">
        @error('post_img') {{$message}} @enderror
      </div>
    </div>

    <div class="form-label-group">
      <textarea id="inputContentBody" class="form-control" name='contentBody' placeholder="spread Your Idies" required rows="14" cols="80"></textarea>
      <div id="email-feedback" class="invalidfeedback">
        @error('contentBody') {{$message}} @enderror
      </div>
    </div>


    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="agree" name='agree'> Agree to our policy.
        <div id="email-feedback" class="invalidfeedback">
          @error('agree') {{$message}} @enderror
        </div>
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Publish</button>
    <p class="mt-5 mb-3 text-muted text-center">Note That the content of the blog should not involve individual or group's rights and policy. Take a Look at<a href="/paluma/Login/?login=true"> Our Policy</a> </p>

  </form>
@endsection
