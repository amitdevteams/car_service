<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>

    <div class="d-flex">
        <div class="dropdown mr-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                aria-expanded="false" data-offset="10,20">
                Offset
            </button>
            <div class="dropdown-menu">

                <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="wrapper bg-white mt-sm-5">
        <form action="{{ route('store.profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="pb-4 border-bottom text-center">Update Your Profile</h4>
            <div class="d-flex align-items-start py-3 border-bottom">
                <img id="previewImage" src="{{ asset('assets/images/no_image.png') }}" class="img"
                    alt="Profile Image" width="150">
                <div class="pl-sm-4 pl-2" id="img-section">
                    <b>Upload Image</b>
                    <p>Accepted file type .png. Less than 1MB</p>
                    <input class="form-control" type="file" id="profileImage" name="image[]" multiple>
                </div>
            </div>

            <div class="py-2">
                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="bg-light form-control" name="name" placeholder="Enter Name">
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="bg-light form-control" name="last_name"
                            placeholder="Enter Last Name">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="email">Email Address</label>
                        <input type="text" class="bg-light form-control" name="email" placeholder="Enter Email">
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3">
                        <label for="phone">Whatsapp No</label>
                        <input maxlength="10" type="tel" class="bg-light form-control" name="phone"
                            placeholder="Enter Phone number">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="email">Price/hr</label>
                        <input type="text" class="bg-light form-control" name="price" placeholder="Enter price">
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3">
                        <label for="phone">Address</label>
                        <input type="tel" class="bg-light form-control" name="address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12 pt-md-0 pt-3">
                        <label for="video">Upload Video</label>
                        <input type="file" class="bg-light form-control" name="youtube" accept="video/*" placeholder="Upload a video file">
                    </div>
                    
                    {{-- <div class="col-md-12 pt-md-0 pt-3">
                        <label for="phone">Youtube</label>
                        <input type="url" class="bg-light form-control" name="youtube" placeholder="Enter Youtube Url">
                    </div> --}}
                </div>

                <div class="py-3 pb-4 border-bottom text-center">
                    <button class="btn btn-primary mr-3">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    <script>
        document.getElementById('profileImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
