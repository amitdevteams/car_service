@extends('layouts.home.index')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .heading-section h2 {
        font-size: 40px !important;
        font-weight: 600 !important;
        margin-top: -120px !important;
        margin-left: -723px !important;

    }
</style>
@section('content')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="">Book Our Services</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($all_profile as $get_data)
                    <div class="">
                        <div class="card rounded ftco-animate">
                            <div id="carouselExampleControls{{ $get_data->id }}" class="carousel slide"
                                data-ride="carousel">
                                <div class="carousel-inner">
                                    @php
                                        // Check if the profile_image field contains multiple images
                                        $images = explode(',', $get_data->profile_image); // Split the images by comma
                                    @endphp
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img class="d-block w-100"
                                                src="{{ asset('upload/admin_images/' . trim($image)) }}"
                                                alt="Slide {{ $key + 1 }}">
                                        </div>
                                        <a data-toggle="modal" data-target="#exampleModal" href="#"
                                            class="intro-banner-vdo-play-btn blueBg">
                                            <i class="fa fa-play-circle whiteText" aria-hidden="true"></i>
                                            <span class="ripple blueBg"></span>
                                            <span class="ripple blueBg"></span>
                                            <span class="ripple blueBg"></span>
                                        </a>
                                    @endforeach
                                </div>
                                <br><br>
                                @if (count($images) > 1)
                                    <a class="carousel-control-prev" href="#carouselExampleControls{{ $get_data->id }}"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls{{ $get_data->id }}"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                @endif
                            </div>
                            <div class="">
                                <?php
                                $name_upper = strtoupper($get_data->name);
                                $n_last_name = strtoupper($get_data->last_name);
                                $final_name = $name_upper . ' ' . $n_last_name;
                                ?>
                                <h2 class="mb-0 text-center"><a href="car-single.html">{{ $final_name }}</a></h2>
                                <div class="d-flex mb-3">
                                    <p style="margin-right: 390px;" class="price ml-auto text-center">
                                        RS&nbsp;{{ $get_data->price }} <span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <?php
                                    $print_phone = $get_data->phone;
                                    $new = '91';
                                    $add_code = $new . $print_phone;
                                    // print_r($add_code);
                                    ?>
                                    <a style="margin-left: 375px;"
                                        href="https://wa.me/{{ $add_code }}?text=Are you available I want to book you."
                                        class="btn btn-primary py-2 mr-1"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                                        &nbsp;Book</a>

                                    <a href="car-single.html" class="btn btn-secondary py-2 ml-1 text-center">Details</a>
                                </p>
                                <br>
                                <div style="margin-left: 375px; font-size: 25px;">
                                    <i class="fa fa-star-o" aria-hidden="true" style="color: red"></i>
                                    <i class="fa fa-star-o" aria-hidden="true" style="color: red"></i>
                                    <i class="fa fa-star-o" aria-hidden="true" style="color: red"></i>
                                    <i class="fa fa-star-o" aria-hidden="true" style="color: red"></i>
                                    <i class="fa fa-star-half-o" style="color: red" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Checkout here!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display the video stored in public/upload/video -->
                    <video id="myVideo" width="1280" height="720" controls poster="" class="myvideo img-fluid">
                        <source src="{{ asset('upload/videos/' . $get_data->youtube_video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal start here  --}}
    {{-- modal start here  --}}
@endsection
