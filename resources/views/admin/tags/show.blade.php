@extends('layouts.admin')

@section('title', 'Show Category')

@section('content')
 <main class="app-main">


        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6 d-flex align-items-center">
                <h3 class="mb-0 me-3">{{ $tag->title}}</h3>
              
                  <a href="{{ route('admin.tags.edit', $tag->id)}}" class="text-secondary me-1">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{ route('admin.tags.destroy', $tag->id)}}" method="POST">
                      @csrf 
                      @method('DELETE')
                      <button type="submit" class="text-secondary bg-transparent border-0">
                      <i class="far fa-trash-alt"></i>
                      </button>
                  </form>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
          
            <div class="row">
              <div class="col-6 mt-3">
                  <div class="card mb-4">
               
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
             
                      <tbody>
                      
                          <tr class="align-middle">
                            <td>ID</td>
                            <td>{{ $tag->id}}</td>
                          </tr>
                          <tr>
                            <td>Название</td>
                            <td>{{ $tag->title}}</td>
                          </tr>
                  
                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item">
                        <a class="page-link" href="#">«</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">»</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <!--end::Col-->
            </div>
     
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

@endsection