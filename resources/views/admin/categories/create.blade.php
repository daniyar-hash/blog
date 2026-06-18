@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Добавление категории</h3>
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
                  <form action="{{ route('admin.categories.store')}}" method="POST" class="w-25">
                      @csrf  
                      <div class="form-group mb-2">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"  aria-describedby="Название">
                     
                          @error('title')

                        <div class="invalid-feedback">
                          {{ $message}}
                        </div>
                      @enderror
                          </div>
                 
                      <input type="submit" class="btn btn-primary" value="Добавить">
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