@extends('backend.layout.master')

@section('title', 'Edit News')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')

    <section class="content-header">
        <h1>
            CHỈNH SỬA BÀI VIẾT
            <small><a href="{{ route('admin.news.index') }}" class="btn btn-block btn-xs btn-warning btn-flat">Back</a></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#" style="margin-right: 30px; font-size: 15px;"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">

            <form action="{{ route('admin.news.update',$news->id) }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="newstitle">Tiêu đề bài viết</label>
                                <input type="text" name="title" class="form-control" value="{{ $news->title }}" id="newstitle">
                            </div>
                            <div class="form-group">
                                <label>Chi tiết nội dung</label>
                                <textarea class="textarea" id="editor1" name="details" placeholder="Place some text here" style="width: 100%; height: 1010px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{ $news->details }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Chọn thể loại</label>
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $news->category_id) {{'selected'}} @endif)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="box-body">
                                <img src="{{ asset('images/'.$news->image) }}" alt="{{ $news->title }}" class="img-responsive">
                            </div>
                            <div class="form-group">
                                <label for="newsimage">Featured Image</label>
                                <!--<input type="file" name="image" id="newsimage"> -->
                                <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="newsimage">
                                <input id="{{$uniqid}}" type="hidden" name="image">
                                <p class="help-block">(Image must be in .png or .jpg format)</p>
                            </div>
                            <hr>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" {{ $news->status ? 'checked' : '' }}> Published
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="featured" {{ $news->featured ? 'checked' : '' }}> Featured
                                </label>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">UPDATE</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </section>

@endsection

@push('scripts')
    <!-- iCheck -->
    <script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('backend/components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {

            $('.select2').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });

            CKEDITOR.replace( 'editor1' );
        });
    </script>
@endpush