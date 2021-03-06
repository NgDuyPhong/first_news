@extends('backend.layout.master')

@section('title', 'Edit Category')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
@endpush

@section('content')

<section class="content-header">
    <h1>
        Chỉnh sửa thể loại
        <small><a href="{{ route('admin.category.index') }}" class="btn btn-block btn-xs btn-warning btn-flat"><i
                    class="fa fa-plus"></i> Quay về</a></small>
    </h1>
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol> -->
</section>
<script>
    croppieRatio = 16/7;
</script>
<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Chi tiết chỉnh sửa</h3>
                </div>

                <form action="{{ route('admin.category.update',$category->id) }}" method="POST"
                    enctype="multipart/form-data" role="form">
                    @csrf
                    @method('PUT')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="categoryname">Tên thể loại</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}"
                                id="categoryname">
                        </div>
                        <div class="form-group">
                            <label for="categoryname">Nhóm thể loại</label>
                            <select id="group_categories_id" name="group_categories_id"
                                class="form-control has-feedback{{ $errors->has('group_categories_id') ? ' has-error' : '' }}">
                                @foreach($arrGroupCategory as $key => $topnews)
                                @if ($category->group_categories_id == $topnews->id)
                                <option selected value="{{$topnews->id}}">{{$topnews->name}}</option>
                                @endif
                                @if ($category->group_categories_id != $topnews->id)
                                <option value="{{$topnews->id}}">{{$topnews->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoryimage">Hình ảnh của thể loại</label>
                            {{-- <input type="file" name="image" id="categoryimage"> --}}
                            <input type="file" hidden-id="{{$uniqid = uniqid()}}" id="categoryimage">
                            <input id="{{$uniqid}}" type="hidden" name="image">
                            <p class="help-block">(Hình ảnh phải ở định dạng .png hoặc .jpg)</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" {{ $category->status ? 'checked' : '' }}> Có hiệu
                                lực
                            </label>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Cập nhật</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ảnh thể loại</h3>
                </div>
                <div class="box-body">
                    <img src="{{ asset('images/'.$category->image) }}" alt="{{ $category->name }}"
                        class="img-responsive">
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<!-- iCheck -->
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });
        });
</script>
@endpusht>
@endpush
