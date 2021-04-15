@php

    $blogs = \VaahCms\Modules\Cms\Entities\Content::leftJoin('vh_cms_content_types', function ($join) {
                $join->on('vh_cms_content_types.id', 'vh_cms_contents.vh_cms_content_type_id');
            })->join('vh_cms_content_form_fields', function ($join) {
                $join->on('vh_cms_content_form_fields.vh_cms_content_id', '=', 'vh_cms_contents.id');
            })->join('vh_cms_form_fields', function ($join) {
                $join->on('vh_cms_form_fields.id', '=', 'vh_cms_content_form_fields.vh_cms_form_field_id');
            })->where('vh_cms_content_types.slug', 'blog')->where('vh_cms_contents.status', 'published');

            if (app('request')->input('category')) {
                $blogs = $blogs->where('vh_cms_form_fields.slug', 'category')
                    ->where('vh_cms_content_form_fields.content', app('request')->input('category'))
                    ->orderBy('vh_cms_contents.created_at', 'desc')
                ->select('vh_cms_contents.id', 'vh_cms_contents.created_at')
                ->distinct()->get();
            }else{
                $blogs = $blogs->orderBy('vh_cms_contents.created_at', 'desc')
                ->select('vh_cms_contents.id', 'vh_cms_contents.created_at')
                ->distinct()->simplePaginate(6);
            }

@endphp




<div class="container">
    <div class="section">
        <div class="columns">
            <div class="column is-three-quarters">
                <div class="section">
                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                    <div class="columns is-multiline">
                        @if(isset($blogs) && (is_array($blogs) || is_object($blogs)) && count($blogs) > 0)
                            @foreach($blogs as $blog)

                                @php

                                    $response = \VaahCms\Modules\Cms\Entities\Content::getItem($blog->id);

                                     if($response['status'] != 'success')
                                     {
                                         $blog_data = $blog;
                                     }

                                     //for controller
                                     $blog_data = $response['data'];


                                    $image = '';
                                    $name = '';
                                    $title = '';

                                    if($blog_data->authorUser){
                                        $image = $blog_data->authorUser->avatar;
                                        $name = $blog_data->authorUser->name;
                                        $title = $blog_data->authorUser->title;

                                    }


                                @endphp

                            @if(count($blogs) === 1)
                                    <div class="card column is-two-thirds is-offset-one-fifth">

                                            <a href="{{url('/blog/'.$blog_data->permalink)}}">

                                                <div class="card-content">

                                                    @if($blog_data->authorUser)
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <figure class="image is-48x48">
                                                                    @if($image)
                                                                        <img src='{{$image}}' alt="author_image"/>
                                                                    @else
                                                                        <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
                                                                    @endif

                                                                </figure>
                                                            </div>
                                                            <div class="media-content">
                                                                <p>
                                                                    <strong>{{$name ? $name : '' }}</strong>
                                                                    <br>
                                                                    <small>{{ $title ? $title : '' }}</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                            </a>


                                            <div class="content">
                                                <a href="{{url('/blog/'.$blog_data->permalink)}}">
                                                    <h4>{!! get_field($blog_data, 'title') !!}</h4>
                                                    <h6>{!! substr(strip_tags(get_field($blog_data, 'content')), 0, 250); !!}....</h6>
                                                </a>
                                                <br/>
                                                <br/>
                                                <div class="level">

                                                        <span class="level-left has-text-weight-bold">
                                                            <a href="{{url('/home/?category='.get_field($blog_data, 'category'))}}">
                                                                {!! get_field($blog_data, 'category') !!}
                                                            </a>
                                                        </span>
                                                    <br/>
                                                    <small class="level-right">{{date('d M Y - h:i A', strtotime($blog_data->created_at))}}</small>
                                                </div>
                                            </div>

                                        </div>
                            @else
                                    <div class="column is-6" style="display: grid;">
                                        <div class="card box">

                                            <a href="{{url('/blog/'.$blog_data->permalink)}}">
                                                <div class="card-image">
                                                    <figure class="image is-4by3">
                                                        @if(get_field($blog_data, 'thumbnail-image'))
                                                            <img src='{{get_field($blog_data, 'thumbnail-image')}}'/>
                                                        @else
                                                            <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
                                                        @endif
                                                    </figure>
                                                </div>

                                                <div class="card-content">

                                                    @if($blog_data->authorUser)
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <figure class="image is-48x48">
                                                                    @if($image)
                                                                        <img src='{{$image}}' alt="author_image"/>
                                                                    @else
                                                                        <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
                                                                    @endif

                                                                </figure>
                                                            </div>
                                                            <div class="media-content">
                                                                <p>
                                                                    <strong>{{$name ? $name : '' }}</strong>
                                                                    <br>
                                                                    <small>{{ $title ? $title : '' }}</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                            </a>


                                            <div class="content">
                                                <h4>{!! get_field($blog_data, 'title') !!}</h4>
                                                <span>{!! substr(strip_tags(get_field($blog_data, 'content')), 0, 250); !!}....</span>
                                                <br/>
                                                <br/>
                                                <div class="level">

                                                        <span class="level-left has-text-weight-bold">
                                                            <a href="{{url('/home/?category='.get_field($blog_data, 'category'))}}">
                                                                {!! get_field($blog_data, 'category') !!}
                                                            </a>
                                                        </span>
                                                    <br/>
                                                    <small class="level-right">{{date('d M Y - h:i A', strtotime($blog_data->created_at))}}</small>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            @endif

                            @endforeach
                        @else
                            <img style="width: -webkit-fill-available"
                                 src='https://cdn.dribbble.com/users/683081/screenshots/2728654/exfuse_app_main_nocontent.png?compress=1&resize=400x300'/>
                        @endif
                    </div>
                </div>
                <div class="has-text-centered">
                    @if(!app('request')->input('category'))
                        {{$blogs}}
                    @endif

                </div>

            </div>
            <div class="column">
                @include('bulmablogtheme::frontend.partials.side-bar-filter')
            </div>

        </div>



    </div>
</div>

