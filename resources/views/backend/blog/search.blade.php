@extends('admin2.index')
@section('content')



<script src="{{ asset('js/blog.js')}}"></script>


     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blogs Table</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a class="btn btn-default btn-sm"  href="{{ route('blog.create') }}">
                    <i class="fas fa-plus-circle">
                    </i>
                    Create
                  </a></h3>
                  <div class="float-right">
                    <form action="{{route('blog.search')}}" method="GET" enctype="multipart/form-data" style="display: flex">
                    <input type="text" name="key" value="{{$keyword}}" style="width: 150px;border:none;border-bottom: 1px solid #eee;width:100px;" placeholder="Search" aria-label="Search">
                  <select name="id" id="categories" style="border: none;;background-color:#fff;color:rgb(170, 168, 168);width:100px;">
                    @foreach ($categorys_name as $cate)
                       <option value="{{$key_id}}">Name : {{$cate->name}}</option>
                    @endforeach
                    <br>
                    @foreach ($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>                    
                  <button style="border: none;background-color:#fff;color:rgb(170, 168, 168)" type="submit"><i class="fa fa-search"></i></button>
                  </form>
                  </div>
              </div>

              <div style="display: flex;padding:15px 0 0">
                <div class="dropdown mx-auto">
                  <a  class="btn btn-outline-secondary btn-sm" href="{{ route('blog.index')}}"><i class="fa fa-table"></i>
                    Reset
                  </a>
                  <div class="btn btn-outline-secondary btn-sm">
                    @sortablelink('title','Sort')
                  </div>
                </div>
        
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th># ID</th>
                    <th>Title</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @if(count($blogs) === 0)
                <th class="list-inline">KCDL</th>
                @else
                    @foreach ($blogs as $key => $blog)           
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$blog->title}}</td>
                        <td> <img src="{{$blog->image}}" alt=""  style="width:60px;height:60px;border-radius:50%"> </td>
                        <td>{{$blog->view}}</td>
                        <td>{{$blog->categories->name}}</td>
                        <td> 
                        <div style="display: flex;">
                        <a class="btn btn-default btn-sm" onclick="Bl.show({{$blog->id}})" >
                            <i class="fa fa-eye"></i>
                            Show
                        </a>
                        <a class="btn btn-default btn-sm" href="{{route('blog.edit',$blog->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                                Edit
                        </a>
                        <form  action="{{ route('blog.destroy',$blog->id) }}" method="post">
                          @csrf
                          <a class="btn btn-default btn-sm delete-confirm" data-name="{{ $blog->title }}" type="submit"><i class='fas fa-trash-alt'></i> Delete</a>
                        </form>
                      </div>
                    </td>
                  </tr>                           
                @endforeach
             @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th># ID</th>
                    <th>Title</th>
                    <th>Images</th>
                    <th>View</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                <div class="float-right pt-3">
                  {{$blogs->links()}}
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <div class="modal" id="dx-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Show</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
            <table class="mx-auto modal-content" style="padding: 15px;text-align:center"> 
                <tr>
                  <td># ID: </td>
                  <td style="border-bottom: 1px solid #eee" for="" id="id"></td>
                </tr>          
                <tr>  
                    <td>Description: </td>
                    <td  style="border-bottom: 1px solid #eee"for="" id="description"></td>
                </tr>
                <tr>
                    <td>Content: </td>
                    <td  style="border-bottom: 1px solid #eee" for="" id="content"></td>
                </tr>
                <tr>
                    <td>Image: </td>
                    <td  style="border-bottom: 1px solid #eee" for=""><img id="image" src="#" alt="" srcset="" style="border-radius: 50%" width="250px" height="250px"></td>
                </tr>          
            </table>
        </div>
    
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    
      </div>
    </div>
    </div>
  


  
@endsection