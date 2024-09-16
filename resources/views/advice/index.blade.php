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
    @php
        $locale = app()->getLocale();
    @endphp
    <div class="container my-5">
        <div class="d-flex align-items-center justify-content-end">
            <select id="language-select" class="form-select" style="width: auto;" onchange="changeLanguage(this.value)">
                @foreach ($languages as $language)
                    <option value="{{ $language->code }}" {{ $locale == $language->code ? 'selected' : '' }}>{{ $language->name }}</option>
                @endforeach
                {{-- <option value="id" {{ $locale == 'id' ? 'selected' : '' }}>Indonesia</option> --}}
            </select>
        </div>
        <h2 class="mb-4">Data List</h2>
        <div class="row">
            @foreach ($advices as $advice)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $advice['name'] }}</h5>
                            <p class="card-text">
                                <strong>Information:</strong> {{ strip_tags($advice['information']) }}
                            </p>
                            <p class="card-text">
                                <strong>Actual Tip:</strong> {{ strip_tags($advice['actual_tip']) }}
                            </p>
                            <p class="card-text">
                                <strong><Tbody>Tip Example</Tbody>:</strong>{{ strip_tags($advice['tip_example']) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script defer>
        function changeLanguage(locale) {
            $.ajax({
            url: '{{ route('locale') }}',
            type: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}',
                locale: locale
            },
            success: function(response) {
                alert('Language changed to: ' + locale);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error changing language:', error);
            }
        });
        }
    </script>
</body>

</html>
