<div class="favorite-list-item">
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        style="background-image:url('/profile-image/{{$user->profile_image}}')">
    </div>
    <p>{{ strlen($user->first_name) > 5 ? substr($user->first_name,0,6).'..' : $user->first_name }}</p>
</div>
