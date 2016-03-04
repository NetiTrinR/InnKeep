<!-- {{ $name }} Form Input -->
<div class="form-group">
    <label for="{{ $name }}" class="control-label">{{ title_case($name) }}</label>
    @if(preg_match("/\$\{(.+)\}/", $value))
        <input type="text" name="{{ $name }}" class="form-control" data-toggle="expression" data-value="{{ $value }}" />
    @else
        <input type="text" name="{{ $name }}" class="form-control" value="{{ $value }}" />
    @endif
</div>