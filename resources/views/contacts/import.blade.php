@extends('contacts.layout')
@section('content')

<div class="container">
    <form action="{{ route('contact.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" name="file" type="file" id="formFile">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection