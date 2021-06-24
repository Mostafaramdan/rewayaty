<thead class="thead-dark">
<tr>
<th scope="col">رقم</th>
<th scope="col">الصورة</th>
<th scope="col"> مكان التوجيه</th>
<th scope="col">تاريخ البداية</th>
<th scope="col">تاريخ النهاية</th>
<th scope="col">عدد المشاهدات</th>
<th scope="col">تابع لرواية</th>
<th scope="col">تابع لموضوع</th>

<th scope="col">وقت الإنشاء</th>
<th scope="col">التفعيل</th>
<th scope="col"></th>
</tr>
</thead>
<tbody>
@foreach($records as $record)
    <tr class="record-{{$record->id}}" data-id="{{$record->id}}">
        <td>{{$record->id}}</td>
        <td> <a href="{{$record->image}}" target="_blank" class="btn btn-primary">الصورة</a> </td>
        <td><a href="{{$record->url}}" target="_blank">مكان التوجية</td>
        <td> {{$record->start_at}}</td>
        <td> {{$record->end_at}}</td>
        <td> {{$record->viewers}}</td>
        <td> @if($record->novels_id !=null) {{$record->Novel->name}} @endif </td>
        <td>  @if($record->topics_id !=null)  {{$record->Topic->title}} @endif</td>

        <td>{{Carbon\Carbon::parse($record->created_at)->toDayDateTimeString()}}</td>
        <td>
            <!-- custom checkbox -->
            <label class="slider-check-box" >
                <input type="checkbox" name="checkbox" @if($record->is_active) checked @endif data-type="is_active">
                <span class="check-box-container d-inline-block" >
                    <span class="circle"></span>
                </span>
            </label>
            <!-- end custom checkbox -->
        </td>
        <td>
          <button class="btn-sm btn btn-danger mb-1"  data-toggle="modal" data-target="#delete-modal"   onClick='deleteRecord("{{$record->id}}")'><i class="fas fa-trash"></i></button>
          <button class="btn-sm btn btn-success edit mb-1" data-toggle="modal" data-target="#addEdit-new-modal"><i class="fas fa-edit"></i></button>
          <button class="btn-sm btn btn-primary get-record mb-1" data-toggle="modal" data-target="#view-modal"><i class="fas fa-eye"></i></button>
        </td>
    </tr>
@endforeach
</tbody>
