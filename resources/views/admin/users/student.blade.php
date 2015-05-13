@extends('admin.default')

@section('main')
    <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="active">Students</li>
    </ol>

    <legend>Daftar Students</legend>
    @include('flash::message')
    @include('admin.users.info')
    <table id="table" class="table table-striped table-bordered table-condensed">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Last Updated</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < count($students); $i++)
            <tr>
                <td>{{$i+1}}</td>
                <td>{!!link_to_route('admin.show', $students[$i]->name, ['username' => $students[$i]->username], ['class' => 'text-capitalize'])!!}</td>
                <td>{{$students[$i]->username}}</td>
                <td>Operator</td>
                <td>{{$students[$i]->email}}</td>
                <td>{{$students[$i]->created_at}}</td>
                <td>{{$students[$i]->updated_at->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" href="#">Actions <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.edit', ['id' => $students[$i]->username])}}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                            <li>
                                <a href="{{route('admin.destroy', ['id' => $students[$i]->username])}}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                            </li>
                            <li><a href="{{route('admin.show', ['id' => $students[$i]->username])}}"><i class="glyphicon glyphicon-search"></i> Details</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
    <button onclick="window.location.href='{{route('admin.create')}}'" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Student</button>
@endsection