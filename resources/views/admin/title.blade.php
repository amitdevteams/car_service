@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                    <h1>Add Slider Content</h1>
                    <form class="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Add title</label>
                            <textarea name="content" placeholder="Description"></textarea>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
