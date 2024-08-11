<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>



    <h1 style="text-align:center ;margin-top:50px">Edit Student</h1>
    <div class="container">

        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Student Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $student->name) }}" required>
            </div>

            <!-- Student Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}" required>
            </div>

            <!-- Track Selection -->
            <div class="form-group">
                <label for="track_id">Track</label>
                <select name="track_id" id="track_id" class="form-control" required>
                    <option value="">Select Track</option>
                    @foreach($tracks as $track)
                    <option value="{{ $track->id }}" {{ $student->track_id == $track->id ? 'selected' : '' }}>
                        {{ $track->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @if($student->photo)
                <img src="{{ Storage::url($student->photo) }}" alt="Current Photo" style="max-width: 150px; margin-top: 10px;">
                @endif
            </div>
            <!-- Update Button -->
            <x-button type="submit" color="primary" content="Update Student"></x-button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>