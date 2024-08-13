<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Add Track</title>
</head>

<body>
    <h1 style="text-align:center ;margin-top:50px">Add Course</h1>
    <div class="container">
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="border p-5 bordered w-75 m-auto my-5">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Hours">Hours</label>
                <input type="number" name="hours" id="hours" class="form-control" required>
            </div>
            @error('hours')
            <div class="alert alert-danger">{{ $message }}</div>

            @enderror
            <!-- Student Photo -->
            <div class="form-group">
                <label for="desc">Description</label>
                <input type="text" name="description" id="desc" class="form-control">
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="number" name="grade" id="grade" class="form-control">
            </div>
            @error('grade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <!-- Submit Button -->
            <x-button type="submit" color="primary" content="Add Course"></x-button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>