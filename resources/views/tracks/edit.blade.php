<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>



    <h1 style="text-align:center ;margin-top:50px">Edit Track</h1>
    <div class="container">
        <form action="{{ route('tracks.update', $track->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Track Name -->
            <div class="form-group">

                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $track->name) }}" required>
            </div>

            <!-- Track Hours -->
            <div class="form-group">
                <label for="hours">Hours</label>
                <input type="number" name="hours" id="hours" class="form-control" value="{{ old('hours', $track->hours) }}" required>
            </div>

            <!-- Track Grade -->

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @if($track->photo)
                <img src="{{ Storage::url($track->photo) }}" alt="Current Photo" style="max-width: 150px; margin-top: 10px;">
                @endif
            </div>

            <!-- Update Button -->
            <button type="submit" class="btn btn-primary">Update Track</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>