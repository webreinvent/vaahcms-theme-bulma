<div class="container">
    <div class="section">
        @if (Session::get('failed') && count(Session::get('failed')) > 0)
            <article class="message is-danger">
                <div class="message-body">
                    <ul>
                        @foreach (Session::get('failed') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </article>
        @endif
        @if (Session::get('success'))
            <article class="message is-info">
                <div class="message-body">
                    <strong>{{ Session::get('success') }}</strong>
                </div>
            </article>
        @endif

                <form method="post" action="{{url('/ajax/store-form')}}">
                    <p class="is-size-2 has-text-weight-bold">{!! get_field($data, 'headline', 'header', 'template') !!}</p>

                    <br/>
                        @csrf
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" value="{{ old('name') }}" name="name" type="text" placeholder="Text input">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" value="{{ old('email') }}" name="email" type="email" placeholder="Email input">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Subject</label>
                        <div class="control">
                            <div class="select">
                                <select name="subject" >
                                    <option value="" @if(old('subject') == "") selected @endif>Select subject</option>
                                    <option value="Sports" @if(old('subject') == "Sports") selected @endif>Sports</option>
                                    <option value="Entertainments" @if(old('subject') == "Entertainments") selected @endif>Entertainments</option>
                                    <option value="Education" @if(old('subject') == "Education") selected @endif>Education</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea name="message" class="textarea" placeholder="Textarea">{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input name="is_agree" value='true' type="checkbox">
                                I agree to the <a href="{{url('/terms-and-conditions')}}">terms and conditions</a>
                            </label>
                        </div>
                    </div>


                    <div class="field is-grouped">
                        <div class="control">
                            <button  class="button is-link">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">Cancel</button>
                        </div>
                    </div>
                    <br/>

                </form>

    </div>
</div>
