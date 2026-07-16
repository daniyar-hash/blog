@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Редактирование категории</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Главная</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.categories.index')}}">Категории</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Редактирование категории</li>
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
                  <form action="{{ route('admin.categories.update', $category->id)}}" method="POST" class="w-25">
                      @csrf  
                      @method('PUT')
                      <div class="form-group">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                             value="{{ $category->title}}">
                     
                            @error('title')

                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>
                 
                      <input type="submit" class="btn btn-primary mt-3" value="Обновить">
                  </form>
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