<form class="form-inline" action="{{URL::to('/search')}}">
    <input type="hidden" value="{{csrf_token()}}"/>
    <div class="form-group">
        <input type="text" class="form-control" name="search" placeholder="Search">
    </div>
    <button class="btn btn-primary" type="submit">Search</button>
</form>
