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
                <h3 class="mb-0">Добавление Поста</h3>
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
                  <form action="{{ route('admin.posts.store')}}" id="postForm" method="POST" enctype="multipart/form-data">
                      @csrf  
                      <div class="form-group w-25">
                            
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                              aria-describedby="Название"
                              value="{{ old('title')}}">
                            @error('title')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>
                      <div class="form-group mt-2">
                        <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="text-danger">
                          {{ $message}}
                        </div>
                        @enderror
                      </div>
                     <div class="form-group w-60 mt-2">
                      <label for="">Добавить превью</label>
                          <div class="input-group mt-2">
                            <input type="file" name="preview_image" id="preview_image" hidden>

                            <label for="preview_image" class="btn btn-outline-secondary">
                                Выбрать изображение
                            </label>

                            <label for="preview_image"
                                id="file_name"
                                class="form-control mb-0 text-white text-opacity-50">
                              Файл не выбран
                          </label>
                          <label for="preview_image"
                               
                                class="btn btn-outline-secondary">
                              Загрузить 
                          </label>
                          
                          </div>

                          @error('preview_image')
                        <div class="text-danger">
                         {{ $message}}
                        </div>
                        @enderror
                     </div>
                    <div class="form-group w-60 mt-2">
                      <label for="">Добавить главное изображение</label>
                          <div class="input-group mt-2">
                            <input type="file" name="main_image" id="main_image" hidden>

                            <label for="main_image" class="btn btn-outline-secondary">
                                Выбрать изображение
                            </label>

                            <label for="main_image"
                                id="file_image"
                                class="form-control mb-0 text-white text-opacity-50">
                              Файл не выбран
                          </label>
                          <label for="main_image"
                               
                                class="btn btn-outline-secondary">
                              Загрузить 
                          </label>
                          
                          </div>

                        @error('main_image')
                        <div class="text-danger">
                           {{ $message}}
                        </div>
                        @enderror
                     </div>
                      <div class="mb-3 form-group">
                        <label class="form-label" for="select-default">Выберите категорию</label>
                        <select class="form-select" id="select-default" name="category_id">

                             {{-- Дефолтный пустой вариант --}}
                        <option value="" {{ old('category_id') === null ? 'selected' : '' }} disabled hidden>
                            -- Нажмите, чтобы выбрать категорию --
                        </option>
                        
                          @foreach($categories as $category)
                          
                           <option value="{{$category->id }}"  {{ $category->id == old('category_id') ? 'selected' : ''}}>{{ $category->title}}</option>
                          @endforeach
                         
                        </select>
                        @error('category_id')
                        <div class="text-danger">
                           {{ $message}}
                        </div>
                        @enderror

                      </div>
                      <div class="mb-3 ">
                       <label for="tags" class="form-label text-white">Выберите теги для статьи:</label>
                       {{-- Скрытый инпут с пустым значением отправляет пустую строку, заставляя срабатывать валидатор --}}
                        <input type="hidden" name="tag_ids" value="">
                       <select class="select2 w-100" multiple="multiple"  name="tag_ids[]" data-placeholder=" -- Нажмите, чтобы выбрать теги --" >
                       {{-- Дефолтный пустой вариант --}}
                          <option>              
                          </option>
                          @foreach($tags as $tag)
                           <option  {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}} value="{{ $tag->id}}">{{ $tag->title}}</option>
                          @endforeach
                       
                      </select>
                       @error('tag_ids')
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