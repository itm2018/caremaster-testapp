@extends('admin.layouts.default')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Company</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="bordered message col-12 card-default">
                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-warning mt-1 mb-1">{{session('error')}}</div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success mt-1 mb-1">{{session('success')}}</div>
                            @endif
                        </div>
                        <!-- form start -->
                        <form method="POST" id="editCompanyForm" action="{{ route('company.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <img id="logoImg" height="200"
                                     class="img-thumbnail rounded img-bordered img-size-100 mr-3 img-circle align-content-center"
                                     src=""/>
                                <input id="logoInput" onchange="changedImg()" type="file" name="logo"/>
                                @error('logo')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="companyName">Name</label>
                                    <input type="text" name="name" class="form-control" id="companyName"
                                           placeholder="Enter company name" value="" autocomplete>
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="companyEmail">Email</label>
                                    <input type="email" name="email" class="form-control" id="companyEmail"
                                           placeholder="Enter company email" value="" autocomplete>
                                    @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="companyWebsite">Website</label>
                                    <input type="text" name="website" class="form-control" id="companyWebsite"
                                           placeholder="Enter company website" value="" autocomplete>
                                    @error('website')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        function changedImg() {
            var selectedFile = document.getElementById('logoInput').files[0];
            var img = document.getElementById('logoImg')

            var reader = new FileReader();
            reader.onload = function () {
                img.src = this.result
            }
            reader.readAsDataURL(selectedFile);
        }
    </script>
@stop
