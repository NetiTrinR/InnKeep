<blockquote>
    {{ $entry->entry }}
    <footer>
        <cite>{{ $entry->character->name or $entry->user->name }}</cite>, {{ Carbon\Carbon::parse($entry->created_at)->diffForHumans() }}
    </footer>
</blockquote>
<hr />