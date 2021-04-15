<div class="container">
    <div class="section">
        <div class="columns">
            <h2>{!! get_field($data, 'headline', 'header', 'template') !!}</h2>
            <div class="column">
                <div class="section">

                    <h4>{!! get_field($data, 'sub-headline', 'header', 'template') !!}</h4>

                    <br/>
                    {!! get_field($data, 'content', 'header', 'template') !!}
                    <br/>

                </div>
            </div>
        </div>

    </div>
</div>
