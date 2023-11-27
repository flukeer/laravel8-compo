@extends("inheritance/theme")
@section("title" , "Student" )
@section("content")
 <!-- content -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>รหัสนักศึกษา</th>
            <th>ชื่อสกุล</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
        </tr>
       
    </tbody>
</table>
@endsection