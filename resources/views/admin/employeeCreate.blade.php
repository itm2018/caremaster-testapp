@extends('admin.layouts.default')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Employee</h3>
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
                        <form method="POST" id="editCompanyForm" action="{{ route('employee.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstName">Firstname</label>
                                    <input type="text" name="first_name" class="form-control" id="firstName"
                                           placeholder="Enter employee first name" value="" autocomplete="first_name">
                                    @error('first_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Lastname</label>
                                    <input type="text" name="last_name" class="form-control" id="lastName"
                                           placeholder="Enter employee last name" value="" autocomplete="last_name">
                                    @error('last_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="Enter employee email" value="" autocomplete="email">
                                    @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           placeholder="Enter employee phone number" value="" autocomplete="phone">
                                    @error('phone')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="companyId">Company</label>
                                    <select name="company_id" class="form-control" id="companyId">
                                        @foreach($companies as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
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
    <!-- /.content-wrapper -->
@stop
