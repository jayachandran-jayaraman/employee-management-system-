<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laravel MongoDB CRUD</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI,sans-serif;
}

body{
    background:#f4f6f9;
    padding:40px;
}

.container{
    max-width:1200px;
    margin:auto;
}

.card{
    background:#fff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
    margin-bottom:30px;
}

h2{
    margin-bottom:20px;
    color:#333;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:600;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:8px;
}

input:focus{
    outline:none;
    border-color:#4f46e5;
}

.btn{
    border:none;
    padding:12px 20px;
    border-radius:8px;
    cursor:pointer;
    color:#fff;
    font-weight:600;
}

.btn-primary{
    background:#4f46e5;
}

.btn-success{
    background:#16a34a;
}

.btn-danger{
    background:#dc2626;
}

.btn-warning{
    background:#f59e0b;
}

.success{
    background:#dcfce7;
    color:#166534;
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#4f46e5;
    color:white;
    padding:12px;
    text-align:left;
}

table td{
    padding:12px;
    border-bottom:1px solid #eee;
}

.action-btn{
    text-decoration:none;
    color:white;
    padding:8px 12px;
    border-radius:5px;
    margin-right:5px;
    display:inline-block;
}

.edit{
    background:#f59e0b;
}

.delete{
    background:#dc2626;
}

.error{
    color:red;
    font-size:13px;
    margin-top:5px;
}
</style>

</head>
<body>

<div class="container">

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <h2>
            {{ isset($user) ? 'Edit User' : 'Create User' }}
        </h2>

        <form
            action="{{ isset($user) ? route('users.update',$user->_id) : route('users.store') }}"
            method="POST">

            @csrf

            <div class="form-group">
                <label>Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$user->name ?? '') }}"
                >
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$user->email ?? '') }}"
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Age</label>
                <input
                    type="number"
                    name="age"
                    value="{{ old('age',$user->age ?? '') }}"
                >
                @error('age')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                    class="btn {{ isset($user) ? 'btn-success' : 'btn-primary' }}">
                {{ isset($user) ? 'Update User' : 'Save User' }}
            </button>

        </form>

    </div>

    <div class="card">

        <h2>User List</h2>

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            @forelse($users as $key => $item)

                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->age }}</td>

                    <td>

                        <a href="{{ route('users.edit',$item->_id) }}"
                           class="action-btn edit">
                            Edit
                        </a>

                        <a href="{{ route('users.delete',$item->_id) }}"
                           class="action-btn delete"
                           onclick="return confirm('Delete this user?')">
                            Delete
                        </a>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5" align="center">
                        No Users Found
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>