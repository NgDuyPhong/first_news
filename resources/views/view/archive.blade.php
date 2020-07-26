@extends('view.masterPage')
@section('content')


<!-- ##### Breadcrumb Area Start ##### -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang
                                chủ</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/"> Tìm kiếm </a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="#">Feature</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Archive by Category “TRAVEL”</li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                    @foreach($reworks as $rework)
                    <!-- Single Catagory Post -->
                    <div class="single-catagory-post d-flex flex-wrap">
                        <!-- Thumbnail -->
                        <div class="post-thumbnail bg-img" style="background-image: url(img/bg-img/42.jpg);">
                            <!-- <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a> -->
                            <img src="{{ url('images/'.$rework->image) }}" alt="Girl in a jacket" width="500"
                                height="600">
                        </div>

                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <a href="video-post.html" class="post-title ">{{  str_limit(strip_tags($rework->title),50) }}</a>
                            <!-- Post Meta -->
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                            <p class="one-line-title">{{ str_limit(strip_tags($rework->details),150) }}</p>
                        </div>
                    </div>
                    @endforeach
                    <!-- Pagination -->
                    {!! $reworks->links() !!}
                    {{-- <nav>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                        </ul>
                    </nav> --}}

                </div>
            </div>

            @include('view.rightcategorycolumn')
        </div>
    </div>
</div>
@endsection
