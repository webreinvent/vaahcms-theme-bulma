<section>
    <div class="section box" style="margin-top: 3rem;">
        <form method="get" action="{{url('/search-result')}}">
            <div class="field has-addons">

                <div class="control">
                    <input class="input" value="{{app('request')->input('q')}}" name="q" type="text" placeholder="Find a blog">
                </div>
                <div class="control">
                    <button type="submit" class="button is-primary">
                        Search
                    </button>
                </div>

            </div>
        </form>
    </div>

    @php

        $category = \VaahCms\Modules\Cms\Entities\Content::leftJoin('vh_cms_content_types',function ($join){
            $join->on('vh_cms_content_types.id', 'vh_cms_contents.vh_cms_content_type_id');
        })->join('vh_cms_content_form_fields', function ($join) {
            $join->on('vh_cms_content_form_fields.vh_cms_content_id', '=', 'vh_cms_contents.id');
        })->join('vh_cms_form_fields', function ($join) {
            $join->on('vh_cms_form_fields.id', '=', 'vh_cms_content_form_fields.vh_cms_form_field_id');
        })->where('vh_cms_content_types.slug','blog')
            ->where('vh_cms_form_fields.slug','category')
            ->select('vh_cms_content_form_fields.content')
            ->distinct()
            ->get();

    @endphp

    @if(count($category) > 1)
        <div class="section box">
            <aside class="menu">
                <p class="menu-label">
                    Category
                </p>
                <ul class="menu-list">
                    @foreach($category as $cat)

                        <li>
                            <a href="{{url('/home/?category='.$cat->content)}}"
                               class="{{$cat->content == app('request')->input('category') ? 'is-active':''}}"
                               id="category-filter"
                               data-category="{{ $cat->content }}">
                                {{ $cat->content }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    @endif


</section>
