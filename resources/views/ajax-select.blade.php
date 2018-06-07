{{--<option>--- Select State ---</option>--}}
@if(!empty($index_segmentos))
    @foreach($index_segmentos as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif