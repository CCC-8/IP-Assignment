<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="/xml/users.xsl"?>
<users>
    @foreach($users as $user)
    <user>
        <userID>{{ $user->userID }}</userID>
        <avatar>{{ $user->avatar }}</avatar>
        <username>{{ $user->username }}</username>
        <email>{{ $user->email }}</email>
        <phoneno>{{ $user->phoneno }}</phoneno>
        <address>{{ $user->address }}</address>
        <created_at>{{ $user->created_at }}</created_at>
        <updated_at>{{ $user->updated_at }}</updated_at>
    </user>
    @endforeach
</users>
