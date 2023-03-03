@extends('scheduler.layout.main')
@section('title', 'Dashboard')

@section('content')
    <div class="container px-4 pt-4">
        <h2 class="main-title p-3 text-success">Schedule Types </h2>
        <nav aria-label="breadcrumb" class="my-4">
            <ol class="breadcrumb px-2">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: green">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Schedule Types</li>
            </ol>
        </nav>

        <section class="p-2">
            <div class="d-flex justify-content-end mb-3">
                <a href="#" data-toggle="modal" data-target=".addModal" class="btn btn-outline-success">Add</a>

            </div>
            <div class="">
                <table class="table table-bordered" id="table">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Background Color</th>
                            <th scope="col">Text Color</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Action</th>
                        </tr>
                    <tbody>
                        @foreach ($scheduleTypes as $item)
                            <tr>

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->bg_color }}</td>
                                <td>{{ $item->text_color }}</td>
                                <td>
                                    <img src="{{ asset('storage/icons/'.$item->icon_path) }}" height="50px" width="50px"
                                        style="border-radius: 50%; object-fit: cover;" alt="">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn text-primary mx-2 update" data-name="{{ $item->name }}" data-desc="{{ $item->description }}" data-bg_color="{{ $item->bg_color }}" data-text_color="{{ $item->text_color }}" data-icon_path="{{ $item->icon_path }}" data-url="{{ route('schedule_type.update',['id' => $item->id]) }}" data-toggle="modal"
                                            data-target="#editModal" title="Edit">

                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('schedule_type.destroy', $item->id) }}" method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this record ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button href="#" type="submit" class="btn text-danger mx-2"
                                                title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                {{-- <td style="display:none">{{ route('schedule_type.update',['id' => $item->id]) }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </section>



        {{-- Add modal --}}

        <div class="modal fade addModal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success text-center w-100 fw-bolder fs-4" id="exampleModalLabel">Create
                            Schedules Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('schedule_type.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label fw-bold">Name *</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    @error('name')
                                        <p class="alert alert-danger ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label fw-bold">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="20" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="bg_color" class="form-label fw-bold">Background Color *</label>
                                    <input type="color" id="bg_color" name="bg_color" class="field-radio">
                                    <span class="container" id="color_val"></span>
                                    @error('bg_color')
                                        <p class="alert alert-danger ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="text_color" class="form-label fw-bold">Text Color *</label>
                                    <input type="color" id="text_color" name="text_color" class="field-radio">
                                    <span class="container" id="text_color_val"></span>
                                    @error('text_color')
                                        <p class="alert alert-danger ">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="form-group col-md-6 fw-bold">
                                    <label for="" class="form-label">Icon</label>
                                    <input type="file" name="icon" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer row mb-0">
                                <div class="col text-start">
                                    <button type="button" class="btn btn-danger" style="width: 50%"
                                        data-dismiss="modal">Close</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-success" style="width: 50%">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- Edit modal --}}

        <div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success text-center w-100 fw-bolder fs-4" id="exampleModalLabel">Edit
                            Schedules Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="editForm" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                {{-- <input type="hidden" id="scheduler_types_id" name="scheduler_type_id" value=""> --}}
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label fw-bold">Name *</label>
                                    <input type="text" id="fname" name="name" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label fw-bold">Description</label>
                                    <textarea name="description" id="fdescription" class="form-control" id="" cols="20" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="fbg_color" class="form-label fw-bold">Background Color *</label>
                                    <input type="color" id="fbg_color" name="bg_color" class="field-radio">
                                    <span class="container" id="fcolor_val"></span>
                                    @error('fbg_color')
                                        <p class="alert alert-danger ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ftext_color" class="form-label fw-bold">Text Color *</label>
                                    <input type="color" id="ftext_color" name="text_color" class="field-radio">
                                    <span class="container" id="ftext_color_val"></span>
                                    @error('text_color')
                                        <p class="alert alert-danger ">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>


                            <div class="row mt-2">
                                <div class="form-group col-md-6 fw-bold">
                                    <label for="ficon" class="form-label">Icon</label>
                                    <input type="file" name="icon" id="ficon" class="form-control">
                                    <input type="hidden" id="icon_hidden" name="icon_hidden">
                                </div>
                            </div>

                            </div>
                            <div class="modal-footer row mb-0">
                                <div class="col text-start">
                                    <button type="button" class="btn btn-danger" style="width: 50%"
                                        data-dismiss="modal">Close</button>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-success" style="width: 50%">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <script>
            $(document).ready(function() {


                $(document).on('click', '.update', function() {
                    var id = $(this).attr('data-url');
                    var name = $(this).attr('data-name');
                    var desc = $(this).attr('data-desc');
                    var bg_color = $(this).attr('data-bg_color');
                    var text_color = $(this).attr('data-text_color');
                    var icon_path = $(this).attr('data-icon_path');

                    $('#fname').val(name)
                    $('#fdescription').val(desc)
                    $('#fbg_color').val(bg_color)
                    $('#ftext_color').val(text_color)
                    $('#icon_hidden').val(icon_path)
                    $('#editForm').attr('action', id);
               // alert(id);
             })
            })
        </script>

        <script>
            let bgColorButton = document.getElementById("bg_color");
            let bgColorDiv = document.getElementById("color_val");
            let textColorButton = document.getElementById("text_color");
            let textColorDiv = document.getElementById("text_color_val");

            bgColorButton.oninput = function() {
                bgColorDiv.innerHTML = bgColorButton.value;
                bgColorDiv.style.color = bgColorButton.value;
            }

            textColorButton.oninput = function() {
                textColorDiv.innerHTML = textColorButton.value;
                textColorDiv.style.color = textColorButton.value;
            }

            let fbgColorButton = document.getElementById("fbg_color");
            let fbgColorDiv = document.getElementById("fcolor_val");
            let ftextColorButton = document.getElementById("ftext_color");
            let ftextColorDiv = document.getElementById("ftext_color_val");



            fbgColorButton.oninput = function() {
                fbgColorDiv.innerHTML = fbgColorButton.value;
                fbgColorDiv.style.color = fbgColorButton.value;
            }

            ftextColorButton.oninput = function() {
                ftextColorDiv.innerHTML = ftextColorButton.value;
                ftextColorDiv.style.color = ftextColorButton.value;
            }
        </script>


        <style>
            #bg_color,
            #text_color {
                border-radius: 50%;
                height: 60px;
                width: 60px;
                border: none;
                outline: none;
                -webkit-appearance: none;
            }

            #bg_color::-webkit-color-swatch-wrapper,
            #text_color::-webkit-color-swatch-wrapper {
                padding: 0;
            }

            #bg_color::-webkit-color-swatch,
            #text_color::-webkit-color-swatch {
                border: none;
                border-radius: 50%;
            }

            #fbg_color,
            #ftext_color {
                border-radius: 50%;
                height: 60px;
                width: 60px;
                border: none;
                outline: none;
                -webkit-appearance: none;
            }

            #fbg_color::-webkit-color-swatch-wrapper,
            #ftext_color::-webkit-color-swatch-wrapper {
                padding: 0;
            }

            #fbg_color::-webkit-color-swatch,
            #ftext_color::-webkit-color-swatch {
                border: none;
                border-radius: 50%;
            }
        </style>

    </div>

@endsection
