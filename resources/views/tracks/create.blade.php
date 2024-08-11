<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Add Track</title>
</head>

<body>
    <h1 style="text-align:center ;margin-top:50px">Add Track</h1>
    <div class="container">
        <form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <!-- Track Selection -->

            <div class="form-group">
                <label for="Hours">Hours</label>
                <input type="number" name="hours" id="hours" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="grade">branch</label>
                <input type="text" name="branch" id="branch" class="form-control" required>
            </div>
            <!-- Student Photo -->
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>

            <!-- Submit Button -->
            <x-button type="submit" color="primary" content="Add Track">Add Track</x-button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>