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
                <h3 class="mb-0">Редактирование поста</h3>
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
                  <form action="{{ route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf  
                      @method('PATCH')
                      @csrf  
                      <div class="form-group w-25">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                              aria-describedby="Название"
                              value="{{ old('title', $post->title)}}">
                            @error('title')
                            <div class="text-danger">
                              {{ $message}}
                            </div>
                            @enderror
                      </div>
                      <div class="form-group mt-2">
                        <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                        <div class="text-danger">
                          {{ $message}}
                        </div>
                        @enderror
                      </div>
                     <div class="form-group w-60 mt-2">
                      <label for="">Добавить превью</label>
                         <div class="w-25">
                          <img src="{{ url('storage/' . $post->preview_image) }}" alt="main_image" class="w-50">
                         </div>
                          <div class="input-group mt-2">
                            <input type="file" name="preview_image" id="preview_image" hidden >

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
                       <div class="w-25">
                          <img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                         </div>
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
                          @foreach($categories as $category)
                          
                           <option value="{{$category->id }}" {{ $category->id == old('category_id',$post->category_id) ? 'selected' : ''}}>{{ $category->title}}</option>
                          @endforeach
                         
                        </select>
                      </div>
                      <div class="mb-3 ">
                        <label for="tags" class="form-label text-white">Выберите теги для статьи:</label>
                        <select class="select2 w-100" multiple="multiple"  name="tag_ids[]" data-placeholder="Выберите теги" >
                          @php
                            if(old()){
                               $selectedTags = old('tag_ids', []);
                            }else{
                                $selectedTags = $post->tags->pluck('id')->toArray();

                            }
                          @endphp

                            @foreach($tags as $tag)
                            <option {{ in_array($tag->id, $selectedTags) ? 'selected' : ''}} value="{{ $tag->id}}">{{ $tag->title}}</option>
                            @endforeach
                        
                        </select>
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