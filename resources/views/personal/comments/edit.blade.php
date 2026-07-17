@extends('layouts.personal')

@section('title', 'Edit Comment')

@section('content')
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Редактирование Комментарии</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('personal.dashboard')}}">Главная</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('personal.comments.index')}}">Комментарии</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Редактирование Комментарии</li>
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
            <div class="row w-50">
              <div class="col-12 ">
                  <form action="{{ route('personal.comments.update', $comment->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf  
                      @method('PATCH')
                      @csrf  
                      <div class="form-group">
                        <textarea name="message" class="form-control @error('title') is-invalid @enderror">
                          {{ old('message', $comment->message)}}</textarea>
                            @error('message')
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