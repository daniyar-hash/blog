@extends('layouts.admin')

@section('title', 'Admin Category Page')

@section('content')
 <main class="app-main">


        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
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
                <a href="{{ route('admin.categories.create')}}" class="btn btn-block btn-primary">Добавить</a>
              </div>
              <div class="col-12">
                  Категории
              </div>
              
              <!--end::Col-->
            </div>
     
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

@endsection