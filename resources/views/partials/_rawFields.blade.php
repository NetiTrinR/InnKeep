@foreach($character->toArray() as $key => $value)
    @unless(is_array($value))
        @include('partials._statsField', ['name' => $key, 'value' => $value])
    @else
        <h3>I only do fields!</h3>
    @endif
@endforeach