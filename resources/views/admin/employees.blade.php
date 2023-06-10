@extends('admin.layouts.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employees</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Employees</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="col-6 col-sm-12">
                                <h3 class="card-title">List of employees</h3>
                            </div>
                            <div class="col-6 col-sm-12">
                                <div class="float-right">
                                    <a class="btn btn-primary" href="{{route('employee.create')}}">Create New</a>
                                </div>
                            </div>
                        </div>
                        <div class="bordered message col-12 card-default">
                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-warning mt-1 mb-1">{{session('error')}}</div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success mt-1 mb-1">{{session('success')}}</div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->id}}</td>
                                        <td>{{$employee->first_name}}</td>
                                        <td>{{$employee->last_name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>{{$employee->company->name}}</td>
                                        <td class="vgt-left-align">
                                           <span>
                                               <div class="flex space-x-3 rtl:space-x-reverse">
                                                   <a href="{{route('employee.edit', $employee)}}">
                                                   <span class="distance" distance="1rem">
                                                       <button class="inline-block edit" data-toggle="tooltip"
                                                               data-placement="top" title="Edit">
                                                           <div class="action-btn">
                                                               <span>
                                                                   <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img" width="1em"
                                                                        height="1em" preserveAspectRatio="xMidYMid meet"
                                                                        viewBox="0 0 24 24"
                                                                        class="iconify iconify--heroicons"><path
                                                                           fill="none" stroke="currentColor"
                                                                           stroke-linecap="round"
                                                                           stroke-linejoin="round" stroke-width="1.5"
                                                                           d="m16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path></svg>
                                                               </span>
                                                           </div>
                                                       </button>
                                                   </span></a>
                                                   <form class="delete-object"
                                                         action="{{route('employee.destroy',$employee)}}" method="POST">
                                                       @csrf
                                                       @method('DELETE')
                                                       <input type="hidden" name="id" value="{{$employee->id}}"/>
                                                   <span class="distance" distance="1rem">
                                                       <button class="inline-block remove" data-toggle="tooltip"
                                                               data-placement="top" title="Delete">
                                                           <div class="action-btn">
                                                               <span>
                                                                   <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        aria-hidden="true" role="img" width="1em"
                                                                        height="1em" preserveAspectRatio="xMidYMid meet"
                                                                        viewBox="0 0 24 24"
                                                                        class="iconify iconify--heroicons"><path
                                                                           fill="none" stroke="currentColor"
                                                                           stroke-linecap="round"
                                                                           stroke-linejoin="round" stroke-width="1.5"
                                                                           d="m14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path></svg>
                                                               </span>
                                                           </div>
                                                       </button>
                                                   </span>
                                                   </form>
                                               </div>
                                           </span>
                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div class="col-auto float-right">{{ $employees->links() }}</div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop
