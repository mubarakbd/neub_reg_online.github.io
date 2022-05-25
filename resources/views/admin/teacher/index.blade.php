@extends("admin.layouts.app")
@section('page_title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <a href="{{ url('/admin/facilitis/create') }}" class="btn btn-primary">Add Teacher Information</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Course Code</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Teacher's List Of North East University Bangladesh</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">

                                <tr>

                                    <th>Teacher Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                  <th>image</th>
                                    <th>Action</th>

                                </tr>

                                 @foreach ($teacher_list as $teac)
                                    <tr>
                                         <td>{{ $teac->name}}</td>
                                        <td>{{ $teac->designation }}</td>
                                        <td>{{ $teac->email }}</td>
                                        <td>{{ $teac->phone }}</td>
                                        <td> <img style="width: 70px" height="70px" src="{{asset("storage/$teac->image")}}" alt="image"  ></td> 
                                        </td> 
                                     <td>
                       {{-- <a href="{{ route('facilitis.edit', ['teac'=>$teac->id]) }}" class="btn btn-info">Edit</a> --}}
                        {{-- <form action="{{ url("/admin/courses/$course->id") }}" method="post" style="display:inline"
                          onSubmit="return confirm('Are you sure you want to delete?')">
                          @csrf
                          @method("delete")
                          <input type="submit" class="btn btn-danger" value="Delete" id="delete"> --}}
                      </form> 
                    {{-- </td> --}} 

                                    </tr>
                                @endforeach
                            </table>
                            <div class="pt-5 float-right">
                                {{-- {{$course_code_list->links()}} --}}
                            </div>
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
@endsection
