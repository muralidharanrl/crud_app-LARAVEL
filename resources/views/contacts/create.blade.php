@extends('contacts.layout')
@section('content')

<div class="container">
    <section class="bg-primary text-white shadow mt-4   ">
        <form action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-8">
                    <h4 class="fw-bold "><span class="shadow">Add New Contact</span></h4>
                    <div class="form-row">
                       <div class="col-5 p-2">
                          <label for="" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control shadow">
                       </div>
                       <div class="col-5 p-2">
                        <label for="" class="form-label">address</label>
                        <input type="text" name="address" class="form-control shadow">
                     </div>
                     <div class="col-5 p-2">
                        <label for="" class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control shadow">
                     </div>
                     <div class="col-5 p-2">
                        <label for="" class="form-label">Country</label>
                       <select name="country_id" id="country" class="form-select" id="">
                        <option value="">Select Country</option>
                        @foreach ($country as $each_country)
                        <option value="{{ $each_country->id }}">{{ $each_country->name }}</option>
                        @endforeach
                       </select>
                      
                     </div>

                     <div class="col-5 p-2">
                        <label for="" class="form-label">State</label>
                       <select name="state_id" id="state" class="form-select" id="">
                        <option value="">Select State</option>
                        @foreach ($state as $each_state)
                        <option value="{{ $each_state->id }}">{{ $each_state->name }}</option>
                        @endforeach
                       </select>
                      
                     </div>
                     <button class="btn btn-success col-3 mt-3 mr-4 shadow" id="submit">Submit</button>
                     <div class="float-end">
                        <a href="{{ url('/') }}" class="btn btn-secondary shadow mt-3">Go back</a>
                     </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
 
 

 @push('scripts')
 <script>
    $(document).ready(function() {
       
        $("#country").change(function() {
            alert('coutry');
            var country_id = $(this).val();
            if(country_id == ""){
                $('#state').html("<option value=''>Select Country</option>");

            }

            $.ajax({
                url: "/get-states/"+country_id,
                type: "GET",
                success: function(data){
                    var states = data.states;
                    var html = " <option value=''>Select State</option> ";
                    for(let i=0;i<states.length;i++)
                    html += '
                    <option value="'+states[i]['id']+'">'+states[i]['state']+'</option> ';

                }
                $('states').html(html);
            })
        })
    })
 </script>

 @endpush