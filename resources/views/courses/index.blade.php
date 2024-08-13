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
            <a class="navbar-brand" href="#">Tracks</a>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/students">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/courses">Courses</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 style="text-align: center; margin-top:10px">Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary" style="margin-left:90rem; margin-bottom:30px">Add New Course</a>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Description</th>
                    <th scope="col">Hours</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->grade }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->hours }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('courses.edit', $course->id) }}"><x-button color="primary" content="Edit"></x-button></a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" color="danger" content="Delete"></x-button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center gap-5">
            {{ $courses->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>