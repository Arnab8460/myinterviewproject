<form action="{{ url('test-validation') }}" method="POST">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <button type="submit">Submit</button>
</form>
