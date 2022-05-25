@extends("admin.layouts.app")
@section("page_title")
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{ url('/admin/courselists/create')}}" class="btn btn-primary">Add Course </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Course Offer List</li>
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
              <h3 class="card-title">Course List Of North East University Bangladesh</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
               
                <tr>
               
                  <th>Course Name</th>
                  <th>Course Code</th>
                  <th>Course Credit</th>
            
                  <th>Action</th>
                 
                </tr>
              
                 {{-- @foreach ($courselist as $item )
                  <tr>
                      
                      
                      <td>
                          {{$item->subject_id}}
                      </td>
                      <td>
                          {{$item->subject_code_id}}
                      </td>
                      <td>
                          {{$item->subject_credit_id}}
                      </td>
                     
                    
                      
                     
                 --}}
                  </tr>
                  {{-- @endforeach --}}
              </table>
              <div class="pt-5 float-right">
              {{-- {{$courseoffer->links()}} --}}
            </div>

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