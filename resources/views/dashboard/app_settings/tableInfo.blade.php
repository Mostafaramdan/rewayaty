<thead class="thead-dark">
<tr>
<th scope="col"> </th>
<th scope="col"># </th>
</tr>
</thead>
<tbody>
    <!-- <tr >
        <td>أرقام التليفون</td>
        <td>@foreach($record->phones as $phone ) {{ $phone->phone}} <br> @endforeach</td>
     --> </tr>
    <tr >
        <td>الإيميلات</td>
        <td>@foreach($record->emails as $email ) {{ $email->email}} <br> @endforeach</td>
    </tr>
    <tr >
        <td> عن التطبيق بالعربي</td>
        <td>{{$record->about_us_ar}}</td>
    </tr>
    <tr >
        <td> عن التطبيق بالإنجليزية</td>
        <td>{{$record->about_us_en}}</td>
    </tr>
    <tr >
        <td>  سياسة الإستخدام بالعربي</td>
        <td>{{$record->policy_terms_ar}}</td>
    </tr>
    <tr >
        <td>  سياسة الإستخدام بالإنجليزية</td>
        <td>{{$record->policy_terms_en}}</td>
    </tr>
    
</tbody>
