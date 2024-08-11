<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align:center ;margin-top:50px">Add Student</h1>
    <div class="container">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Student Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- Student Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <!-- Track Selection -->
            <div class="form-group">
                <label for="track_id">Track</label>
                <select name="track_id" id="track_id" class="form-control" required>
                    <option value="">Select Track</option>
                    @foreach($tracks as $track)
                    <option value="{{ $track->id }}" {{ old('track_id') == $track->id ? 'selected' : '' }}>
                        {{ $track->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Student Photo -->
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>

            <!-- Submit Button -->
            <x-button type="submit" color="primary" content="Add Student"></x-button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>