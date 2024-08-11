<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Students</a>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/tracks">Tracks</a>
                    </li>
                </ul>
    </nav>

    <h1 style="text-align: center; margin-top:10px">Students</h1>
    <a href="{{ route('students.create') }}"><button class="btn btn-info text-white" style="margin-left:90rem; margin-bottom:30px">Add Student</button></a>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Track</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                @if ($student && $student->track)
                <tr>
                    <td><img src="{{ asset('storage/'. $student->photo) }}" alt="{{ $student->name }}" width="100"></td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->track->name }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('students.edit', $student->id) }}"><x-button color="primary" content="Edit"></x-button></a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" color="danger" content="Delete"></x-button>
                            </form>
                        </div>
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>