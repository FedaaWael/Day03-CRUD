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
                </ul>
    </nav>
    <h1 style="text-align: center; margin-top:10px">Tracks</h1>
    <a href="{{ route('tracks.create') }}" class="btn btn-primary" style="margin-left:90rem; margin-bottom:30px">Add New Track</a>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Hours</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tracks as $track)
                <tr>
                    <td><img src="{{ asset('storage/'. $track->photo) }}" alt="{{ $track->name }}" width="100"></td>
                    <td>{{ $track->name }}</td>
                    <td>{{ $track->hours }}</td>
                    <td>{{ $track->branch }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('tracks.edit', $track->id) }}"><x-button color="primary" content="Edit"></x-button></a>
                            <form action="{{ route('tracks.destroy', $track->id) }}" method="POST">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>