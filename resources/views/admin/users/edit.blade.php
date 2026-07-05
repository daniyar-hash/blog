@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Редактирование Пользователя</h3>
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
                  <form action="{{ route('admin.users.update', $user->id)}}" method="POST">
                      @csrf  
                      @method('PATCH')
                      @csrf  
                      <div class="form-group w-25 mb-3">
                            
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                              
                              value="{{ old('name', $user->name)}}">
                            @error('name')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>
                      <div class="form-group w-25 mb-3">
                          <input type="hidden"  name="user_id" value="{{$user->id }}">

                      </div>
                           <div class="form-group w-25 mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                              aria-describedby="Название"
                              value="{{ old('email', $user->email)}}">
                            @error('email')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>

                         <div class="mb-3 form-group w-25">
                       
                        <label class="form-label" for="select-default">Выберите роль</label>
                    
                        <select class="form-select" id="select-default" name="role">

                            <option value="" {{ old('role') === null ? 'selected' : '' }} disabled hidden>
                                -- Нажмите, чтобы выбрать роль --
                            </option>
                            
                              @foreach($roles as $id => $role)
                              
                              <option value="{{ $id }}"  {{ $id === $user->role ? 'selected' : ''}}>{{ $role }}</option>
                              @endforeach
                            
                            </select>
                            @error('role')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror

                      </div>
                      <input type="submit" class="btn btn-primary mt-3" value="Обновить">
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