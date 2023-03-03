@extends('scheduler.layout.main')
@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4" hidden>
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-list fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2"></p>
                            <h6 class="mb-0">No of Divisions</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-microchip fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2"></p>
                            <h6 class="mb-0">No of Stations</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-user-pen fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2"></p>
                            <h6 class="mb-0">WIP</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-scanner-gun fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2"></p>
                            <h6 class="mb-0">Scanned Today</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="bg-light mt-4">
            <div class="container">
                <h2 class="lead-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, facilis?
                </h2>
            </div>
        </section>
        {{-- <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @foreach ($station_heartbeats as $station_heartbeat)
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-list fa-2x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">{{\Carbon\Carbon::parse($station_heartbeat->last_beat_at)->format('d-M-Y h:i a')}}</p>
                        <h6 class="mb-0">{{$station_heartbeat->station_name}}</h6>
                    </div>
                </div>
            </div>
            @endforeach --}}


    </div>
    </div>
    </div>
@endsection
