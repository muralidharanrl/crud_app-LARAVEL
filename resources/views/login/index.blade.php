@extends('contacts.layout')
@section('content')

<div class="container">
    <section class="bg-primary text-white shadow mt-4   ">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-8">
                    <h4 class="fw-bold "><span class="shadow">LOGIN</span></h4>
                    <div class="form-row">
                       <div class="col-5 p-2">
                          <label for="name" class="form-label">Name</label>
                          <input  type="text" name="name" class="form-control shadow">
                       </div>
                      
                       <div class="col-5 p-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control shadow">
                     </div>
                     <div class="col-5 p-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="paasword" name="password" class="form-control shadow">
                     </div>
                     <button type="submit" class="btn btn-success col-3 mt-3 mr-4 shadow">Login</button>
                     <div class="float-end">
                        <a href="{{ url('/') }}" class="btn btn-secondary shadow mt-3">Go back</a>
                     </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>