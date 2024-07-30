@extends('adminlayout.master')

@section('dynblock1')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 90px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td button.ban {
    color: #E34724;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="right_col" role="main">
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Client Details</b></h2></div>
                    <div class="col-sm-4">
                        <form action="">
                        <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                            <input type="search" class="form-control" name= "search" id="" placeholder="Search">
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <!-- <th>Date of Birth</th> -->
            <th>Gender</th>
            <th>Email</th>
            <th>Ban/Unban</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($search as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <!-- <td>{{ $user->date_of_birth }}</td> -->
            <td>{{ $user->gender }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->is_banned)
                    <form action="{{ route('users.unban', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="unban" title="Unban User" data-toggle="tooltip"><i class="material-icons">&#xe5ca;</i></button>
                    </form>
                @else
                    <form action="{{ route('users.ban', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="ban" title="Ban User" data-toggle="tooltip"><i class="material-icons">block</i></button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>   
</div>

</body>
</html>
@stop