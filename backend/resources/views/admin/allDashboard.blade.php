@extends('adminlayout.master')

@section('dynblock1')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    .user-count {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        background-color: #f2f2f2;
        padding: 10px;
    }

    .user-types-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0;
    }

    .user-type {
        flex-basis: 30%;
        background-color: #f2f2f2;
        padding: 10px;
    }

    .user-type h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }
    
    .right_col {
        margin-left: 25%; /* Adjust the percentage value as needed */
        padding: 10px;
    }

    /* Add background colors for user numbers */
    .user-count.client {
        background-color: green;
    }
    
    .user-count.lawyer {
        background-color: lightblue;
    }
    
    .user-count.admin {
        background-color: grey;
    }
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

<div class="right_col" role="main">
<div class="container-xl">
<h1>Dashboard</h1>

<div class="user-count">Total Users: {{ $User->count() + $lawyer->count() + $admin->count() + $coadmin->count() }}</div>

<div class="user-types-container">
    <div class="user-type">
        <h2>Clients</h2>
        <div class="user-count">Total Clients: {{ $User->count() }}</div>
    </div>

    <div class="user-type">
        <h2>Lawyers</h2>
        <div class="user-count">Total Lawyers: {{ $lawyer->count() }}</div>
    </div>

    <div class="user-type">
        <h2>Admins</h2>
        <div class="user-count">Total Admins: {{ $admin->count() }}</div>
    </div>

    <div class="user-type">
        <h2>Co-Admins</h2>
        <div class="user-count">Total Co-Admins: {{ $coadmin->count() }}</div>
    </div>
</div>
</div>
</div>

@endsection
