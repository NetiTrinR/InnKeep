<blockquote>
    {{ $announcement->entry }}
    <footer>
        <cite>{{ $announcement->character->name or $announcement->user->name }}</cite>, {{ Carbon\Carbon::parse($announcement->created_at)->diffForHumans() }}
    </footer>
</blockquote>
<hr />