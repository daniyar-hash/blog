@extends('layouts.admin')

@section('title', 'Admin posts Page')

@section('content')
 <main class="app-main">


        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Пользователи</h3>
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
              <div class="col-12">
                <a href="{{ route('admin.users.create')}}" class="btn btn-block btn-primary">Добавить</a>
              </div>

            </div>
            <div class="row">
              <div class="col-6 mt-3">
                  <div class="card mb-4">
               
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
                      <thead>
                        <tr>
                          <th style="width: 10px" scope="col">ID</th>
                          <th scope="col">Название</th>
                          <th colspan="3" class="text-center">Действия</th>
                        </tr>
                      </thead>
                      <tbody>
                           @foreach($users as $user)
                          <tr class="align-middle text-center">
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>
                              <a href="{{ route('admin.users.show', $user->id)}}" class="text-secondary">
                                <i class="far fa-eye"></i>
                              </a>
                            </td>
                            <td>
                              <a href="{{ route('admin.users.edit', $user->id)}}" class="text-secondary">
                               <i class="fas fa-pencil-alt"></i>
                              </a>
                            </td>
                            <td>
                              <form action="{{ route('admin.users.destroy', $user->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-secondary bg-transparent border-0">
                                <i class="far fa-trash-alt"></i>
                                </button>
                               
                              </form>
                               
                            </td>
                          
                          </tr>
                           @endforeach
                  
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