




<div class="container">
    <div class="section">
        <div class="card box">
            <p class="has-text-weight-bold">Search Result for: "{{app('request')->input('q')}}"</p>
        </div>
        <div class="columns">

            <div class="column is-three-quarters">
                <div class="section">
                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                    <div class="columns is-multiline">
                        @if(isset($data) && (is_array($data) || is_object($data)) && count($data) > 0)
                            @foreach($data as $blog)

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


                                                <div class="content">
                                                    <h4>{!! get_field($blog_data, 'title') !!}</h4>
                                                    <span>{!! substr(strip_tags(get_field($blog_data, 'content')), 0, 250); !!}....</span>
                                                    <br/>
                                                    <br/>
                                                    <div class="level">
                                                        <span class="level-left has-text-weight-bold"> {!! get_field($blog_data, 'category') !!}</span>
                                                        <br/>
                                                        <small class="level-right">{{date('d M Y - h:i A', strtotime($blog_data->created_at))}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <img style="width: -webkit-fill-available"
                                 src='https://cdn.dribbble.com/users/683081/screenshots/2728654/exfuse_app_main_nocontent.png?compress=1&resize=400x300'/>
                        @endif
                    </div>
                </div>
                <div class="has-text-centered">
                </div>

            </div>
            <div class="column">
                @include('bulmablogtheme::frontend.partials.side-bar-filter')
            </div>

        </div>



    </div>
</div>


