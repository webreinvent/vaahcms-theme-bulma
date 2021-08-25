@extends("bulmablogtheme::frontend.layouts.default")

@section('vaahcms_extend_frontend_head')

@endsection

@section('vaahcms_extend_frontend_css')

@endsection

@section('vaahcms_extend_frontend_scripts')

@endsection

@section('content')
    <div>

{{--        {!! dd(get_the_content($data)) !!}--}}
{{--        {!! get_content($data) !!}--}}

        @include('bulmablogtheme::frontend.partials.header')
        @include('bulmablogtheme::frontend.partials.blog-content')
        @include('bulmablogtheme::frontend.partials.footer')
    </div>
@endsection


