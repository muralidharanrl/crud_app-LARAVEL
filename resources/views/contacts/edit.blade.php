@extends('contacts.layout')
@section('content')

<div class="container">
    <section class="bg-primary text-white shadow mt-4   ">
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-8">
                    <h4 class="fw-bold "><span class="shadow">Edit Contact</span></h4>
                    <div class="form-row">
                        <div class="col-5 p-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" value="{{ $contact->name }}" name="name" class="form-control shadow">
                        </div>
                        <div class="col-5 p-2">
                            <label for="" class="form-label">Address</label>
                            <select name="address" id="" class="form-control shadow">
                                @foreach ($allContacts as $contact)
                                    <option value="{{ $contact->id }}" {{ $contact->address == $contact->id ? 'selected': '' }}>
                                        {{ $contact->address }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5 p-2">
                            <label for="" class="form-label">Mobile</label>
                            <input type="text" value="{{ $contact->mobile }}" name="mobile" class="form-control shadow">
                        </div>
                        <button class="btn btn-success col-3 mt-3 mr-4 shadow">Update</button>
                        <div class="float-end">
                            <a href="{{ url('/') }}" class="btn btn-secondary shadow mt-3">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
</div>
