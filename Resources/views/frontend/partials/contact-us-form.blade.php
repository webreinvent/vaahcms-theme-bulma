<div class="container">
    <div class="section">
        <div class="columns">

            <div class="column">
                <form method="post" action="{{url('/ajax/store-form')}}">
                    <div class="section">
                    <p class="is-size-2 has-text-weight-bold">{!! get_field($data, 'headline', 'header', 'template') !!}</p>

                    <br/>
                        @csrf
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" name="name" type="text" placeholder="Text input">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" name="email" type="email" placeholder="Email input">
                            <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Subject</label>
                        <div class="control">
                            <div class="select">
                                <select name="subject">
                                    <option value="">Select dropdown</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Entertainments">Entertainments</option>
                                    <option value="Education">Education</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea name="message" class="textarea" placeholder="Textarea"></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input name="is_agree" value='true' type="checkbox">
                                I agree to the <a href="#">terms and conditions</a>
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

                </div>
                </form>
            </div>
        </div>

    </div>
</div>
