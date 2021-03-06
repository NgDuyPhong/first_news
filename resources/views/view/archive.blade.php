

@extends('view.masterPage')
@section('content')
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-8 px-md-5 py-5">
                    <div class="row pt-md-4">
                        @include('view.postitem')
                        <!-- Pagination -->
                        {!! $newslist->appends(request()->input())->links() !!}
                    </div><!-- END-->
                </div>
                @include('view.rightcategorycolumn')
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
@endsection
