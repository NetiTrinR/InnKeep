<div id="entry-{{ $entry->id }}" data-entry="{{ $entry->entry }}" data-author="{{ $entry->author->name }}" data-campaign="{{ $entry->campaign->name }}" data-user="{{ $entry->user->name }}" class="entry">
    <blockquote>
        {{ $entry->entry }}
        <footer>
            <cite>
                <a href="{{ route(($entry->author instanceof \App\Character ? 'character.show' : 'user.show'), $entry->author->id) }}">{{ $entry->author->name }}</a>
            </cite>,
            {{ $entry->campaign->name }},
            {{ $entry->created_at->diffForHumans() }}
            @if($entry->user->id == Auth::user()->id)
                <a href="{{ route('library.journal.edit', $entry->id) }}" class="pull-right"><i class="glyphicon glyphicon-edit"></i></a>
            @endif
        </footer>
    </blockquote>
    <hr />
</div>