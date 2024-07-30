@extends('adminlayout.master')

@section('dynblock1')

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container1 {
      max-width: 900px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    h1 {
      text-align: center;
      margin-top: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th,
    table td {
      padding: 12px;
      border: 1px solid #ccc;
    }

    table th {
      background-color: #f2f2f2;
      font-weight: bold;
      text-align: left;
    }

    table td {
      background-color: #fff;
    }

    .action-buttons {
      white-space: nowrap;
    }

    .edit-button {
      background-color: #4CAF50;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      margin-right: 5px;
    }

    .delete-button {
      background-color: #f44336;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      margin-right: 5px;
    }
    .logout-button {
      background-color: #f44336;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      margin-right: 5px;
    }

  </style>
</head>
<body>
  <div class="container1">
    <h1>Admin Profile</h1>
    <table>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>

      <tr>
        <td>{{ $admin->first_name }}</td>
        <td>{{ $admin->last_name }}</td>
        <td>{{ $admin->email }}</td>
        <td>{{ $admin->created_at }}</td>
        <td>
          <div class="actions">
          <a href="{{ url('/adminEdit/' . $admin->id) }}" class="edit-button">Edit</a>
          <!-- <a href="#" class="delete-button">delete</a> -->
          </div>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
<!-- jQuery library -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- Bootstrap JavaScript -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

@stop
