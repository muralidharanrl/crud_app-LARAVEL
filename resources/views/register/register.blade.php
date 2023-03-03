@extends('contacts.layout')
@section('content')

<div class="container">
    <section class="bg-primary text-white shadow mt-4   ">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-8">
                    <h4 class="fw-bold "><span class="shadow">REGISTER</span></h4>
                    <div class="form-row">
                       <div class="col-5 p-2">
                          <label for="name" class="form-label">Name</label>
                          <input  type="text" name="name" value="{{ old('name') }}" class="form-control shadow">
                       </div>

                       @error('name')
                           <p class="text-danger text-sm mt-1">{{ $message }}</p>
                       @enderror

                       <div class="col-5 p-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control shadow" required>
                     </div>

                     @error('username')
                         <p class="text-danger text-sm mt-1">{{ $message }}</p>
                     @enderror

                       <div class="col-5 p-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control shadow" required>
                     </div>

                     @error('email')
                         <p class="text-danger text-sm mt-1">{{ $message }}</p>
                     @enderror

                     <div class="col-5 p-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="paasword" name="password" value="{{ old('password') }}" class="form-control shadow" required>
                     </div>

                     @error('password')
                         <p class="text-danger text-sm mt-1">{{ $message }}</p>
                     @enderror
                     <button type="submit" class="btn btn-success col-3 mt-3 mr-4 shadow">Register</button>
                     <div class="float-end">
                        <a href="{{ url('/') }}" class="btn btn-secondary shadow mt-3">Go back</a>
                     </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>