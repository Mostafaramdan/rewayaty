@foreach($records as $record)
    <a class="dropdown-item" href="#" val="{{$record->id}}">  {{$record->name}}</a>
@endforeach
