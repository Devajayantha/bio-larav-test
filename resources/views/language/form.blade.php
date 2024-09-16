<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Language</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">{{ isset($language) ? 'Update' : 'Add'}} Language</h2>
        <form action="{{ isset($language) ? route('languages.update', compact('language')) : route('languages.store')}}" method="POST">
            @csrf
            @isset($language)
                @method('PATCH')
            @endisset
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name', isset($language) ? $language->name : '')}}">
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control" name="code" value="{{ old('code', isset($language) ? $language->code : '')}}">
              </div>
            <a href="{{ route('languages.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>
</body>
</html>
