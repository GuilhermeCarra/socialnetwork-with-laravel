@if($user->id != auth()->user()->id)
<form name="follow-form" id="follow-form" method="post" id="follow-form" data-follow="{{$following}}" action="{{$following ? route('unfollow') : route('follow')}}">
@if($following)
        @method('DELETE')
    @endif
    @csrf
    <input type="hidden" name="follower" value="{{auth()->user()->id}}">
    <input type="hidden" name="followed" value="{{$user->id}}">
    <button type="submit" class="btn btn-primary">{{$following ? 'Unfollow' : 'Follow'}}</button>
</form>
@endif