@extends('layouts.admin')

@section('title', 'Add Post')

@section('content')
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Добавление Пользователя</h3>
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
                  <form action="{{ route('admin.users.store')}}" id="postForm" method="POST" enctype="multipart/form-data" >
                      @csrf  
                      <div class="form-group w-25 mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                              
                              value="{{ old('name')}}" placeholder="Имя пользователя">
                            @error('name')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>
                        <div class="form-group w-25 mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                             
                              value="{{ old('email')}}" placeholder="Email">
                            @error('email')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>
                        <div class="form-group w-25 mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           
                              " placeholder="Пароль">
                            @error('password')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                  </form>
              </div>
              <!--end::Col-->
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

@endsection