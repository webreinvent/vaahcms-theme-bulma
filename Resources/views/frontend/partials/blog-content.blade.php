<div class="container">
    <div class="section">
        <div class="columns">
            <div class="column is-three-quarters">
                <div class="section">
                    <p class="is-size-2 has-text-weight-bold">{!! get_field($data, 'title') !!}</p>
                    @if($data->authorUser)
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    @if($data->authorUser->avatar)
                                        <img src='{{$data->authorUser->avatar}}' alt="author_image"/>
                                    @else
                                        <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
                                    @endif

                                </figure>
                            </div>
                            <div class="media-content">
                                <p>
                                    <strong>{{$data->authorUser->name ? $data->authorUser->name : '' }}</strong>
                                    <br>
                                    <small>{{ $data->authorUser->title ? $data->authorUser->title : '' }}</small>
                                </p>
                            </div>
                        </div>
                    @endif
                    <br/>
                    @if(get_field($data, 'thumbnail-image'))
                        <img src='{{get_field($data, 'thumbnail-image')}}'/>
                    @endif
                    <br/>
                    <br/>
                    {!! get_field($data, 'content') !!}
                    <br/>
                    <br/>
                    <div class="level">
                        <span class="level-left"><span style="font-weight: bold">Category:&nbsp;</span> {!! get_field($data, 'category') !!}</span>
                        <br/>
                        <p class="level-right">{{date('d M Y - h:i A', strtotime($data->created_at))}}</p>
                    </div>

                </div>
            </div>
            <div class="column">
                @include('bulmablogtheme::frontend.partials.side-bar-filter')
            </div>
        </div>

    </div>
</div>
