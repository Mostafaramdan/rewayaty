
<textarea name="{{$field}}" id="{{$field}}-Jodit" class="form-control"style='height:200px' >{{ old('description') }}</textarea>
<script>  var editor = new Jodit('#{{$field}}-Jodit');</script>
