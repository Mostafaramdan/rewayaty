<thead class="thead-dark">
    <tr>
        <th scope="col">الاسم</th>
        <th scope="col">صورة الكفر</th>
        <th scope="col">عدد المشاهدات</th>
        <th scope="col">المستخدم</th>
        <th scope="col">معلقة ؟ </th>
        <th scope="col">التفعيل</th>
        <th scope="col"></th>
    </tr>
</thead>
<tbody>
@foreach($records as $record)
    <tr class="record-{{$record->id}}" data-id="{{$record->id}}">
        <td>{{$record->name}}</td>
        <td>   <a target="_blank" href="{{$record->cover_image}}" class="btn btn-primary">صورة الكفر</a> </td>
        <td>{{$record->views}}</td>

        <td><a href="/{{Request::segment(1)}}/users?id={{$record->users_id}}">{{$record->user->name??''}}</a></td>
        <td>
            <!-- custom checkbox -->
            <label class="slider-check-box" >
                <input type="checkbox" name="checkbox" @if($record->is_pending) checked @endif data-type="is_pending">
                <span class="check-box-container d-inline-block" >
                    <span class="circle"></span>
                </span>
            </label>
            <!-- end custom checkbox -->
        </td>
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
