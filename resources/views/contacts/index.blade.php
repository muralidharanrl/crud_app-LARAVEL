
@extends('contacts.layout')

@section('content')

   
<div class="container p-3 ">
    
    @auth
        <span class="text-primary">Welocome, {{ auth()->user()->name }}</span>
    @else
        <a href="/register" class="btn btn-primary btn-sm">Register</a>
        <a href="/login" class="btn btn-primary btn-sm">Login</a>
    @endauth

    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm mt-2">Log out</button>
    </form>
    <div class="row p-3">
      <div class="col-9">
          <div class="card shadow">
              <div class="card-header">Contacts</div>
              <div class="card-body bg-light">
                <div class="text-end">
                    <a href="{{ url('/create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"> Add New</i>
                    </a>
                </div>
                  <br>
                  <table class="table table-responsive">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Address</th>
                              <th>mobile</th>
                              <td>Country</td>
                              <td>State</td>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($contacts as $contact)
                          <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->mobile }}</td>
                            <td>{{ $contact->country->name }}</td>
                            <td>{{ $contact->state->name }}</td>
                            <td>
                              <a href="#" class="btn btn-warning btn-sm ">View</a>
                              <a href="{{ route('contacts.edit',$contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
 </div>




@endsection