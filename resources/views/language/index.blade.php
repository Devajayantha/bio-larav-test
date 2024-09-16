<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .card {
            border: none;
            border-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #007bff;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-4">Data List</h2>
        <a href="{{ route('languages.create') }}" class="btn btn-primary float-end mb-3">Add</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Language</th>
                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $language)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->code }}</td>
                    <td>
                        <a href="{{ route('languages.edit', compact('language')) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </div>

    <!-- Include Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
