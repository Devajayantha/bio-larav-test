<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Advice - Multi Language</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tab-content {
            margin-top: 15px;
        }

        .translation-button {
            margin-top: 10px;
            display: flex;
            justify-content: flex-end;
        }

        .form-label {
            font-weight: bold;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .nav-tabs .nav-link {
            border: 1px solid #dee2e6;
            border-bottom-color: transparent;
            margin-right: 5px;
        }

        .nav-tabs {
            margin-bottom: -1px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Advice - Multi Language</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form Section -->
        <form action="{{route('advices.update', ['advice' => $advice['id']])}}" method="POST">
            @csrf
            @method('PATCH')
            {{-- Name section --}}
            <div class="container mt-5">
                <div class="mb-4">
                    <label for="title_en" class="form-label">Name (English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="data[en][name]"
                        value="{{ $advice['main_data']['name'] }}" >
                </div>

                <ul class="nav nav-tabs" id="languageTab" role="tablist">
                    @foreach ($advice['translations']['name'] as $translation)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                data-bs-target="#name-{{ $translation['locale'] }}" type="button"
                                role="tab">{{ $translation['name_locale'] }}</button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach ($advice['translations']['name'] as $translation)
                        <!-- Tab -->
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                            id="name-{{ $translation['locale'] }}" role="tabpanel">
                            <div class="mt-3">
                                <label for="title_id" class="form-label">Name
                                    ({{ $translation['name_locale'] }})
                                </label>
                                <input type="text" class="form-control" id="name_{{ $translation['locale'] }}"
                                    name="data[{{ $translation['locale'] }}][name]" value="{{ $translation['title'] }}"
                                    >
                            </div>
                            <div class="translation-button">
                                <button type="button" class="btn btn-primary"
                                    onclick="
                                    getTranslation(
                                        'name',
                                        'name_{{ $translation['locale'] }}',
                                        '{{ $translation['locale'] }}',
                                    )">
                                    Get Automatic Translation
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Information section --}}
            <div class="container mt-5">
                <div class="mb-4">
                    <label for="title_en" class="form-label">Information (English) <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="information" name="data[en][information]"
                        value="{{ $advice['main_data']['information'] }}" >
                </div>

                <ul class="nav nav-tabs" id="languageTab" role="tablist">
                    @foreach ($advice['translations']['information'] as $translation)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                data-bs-target="#information-{{ $translation['locale'] }}" type="button"
                                role="tab">{{ $translation['name_locale'] }}</button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach ($advice['translations']['information'] as $translation)
                        <!-- Tab -->
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                            id="information-{{ $translation['locale'] }}" role="tabpanel">
                            <div class="mt-3">
                                <label for="title_id" class="form-label">Information
                                    ({{ $translation['name_locale'] }})
                                </label>
                                <textarea class="form-control"  rows="4"
                                id="information_{{ $translation['locale'] }}"
                                name="data[{{ $translation['locale'] }}][information]"
                                >{{ $translation['title'] }}</textarea>
                            </div>
                            <div class="translation-button">
                                <button type="button" class="btn btn-primary"
                                    onclick="
                                                getTranslation(
                                                    'information',
                                                    'information_{{ $translation['locale'] }}',
                                                    '{{ $translation['locale'] }}',
                                                )">
                                    Get Automatic Translation
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Actual Tip section --}}
            <div class="container mt-5">
                <div class="mb-4">
                    <label for="title_en" class="form-label">Actual Tip (English) <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="actualtip" name="data[en][actualtip]"
                        value="{{ $advice['main_data']['actual_tip'] }}" >
                </div>

                <ul class="nav nav-tabs" id="languageTab" role="tablist">
                    @foreach ($advice['translations']['actual_tip'] as $translation)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                data-bs-target="#actualtip-{{ $translation['locale'] }}" type="button"
                                role="tab">{{ $translation['name_locale'] }}</button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach ($advice['translations']['actual_tip'] as $translation)
                        <!-- Tab -->
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                            id="actualtip-{{ $translation['locale'] }}" role="tabpanel">
                            <div class="mt-3">
                                <label for="title_id" class="form-label">Actual Tip
                                    ({{ $translation['name_locale'] }})
                                </label>
                                <textarea class="form-control"  rows="4"
                                id="actualtip_{{ $translation['locale'] }}"
                                name="data[{{ $translation['locale'] }}][actualtip]"
                                >{{ $translation['title'] }}</textarea>

                            </div>
                            <div class="translation-button">
                                <button type="button" class="btn btn-primary"
                                    onclick="
                                                            getTranslation(
                                                                'actualtip',
                                                                'actualtip_{{ $translation['locale'] }}',
                                                                '{{ $translation['locale'] }}',
                                                            )">
                                    Get Automatic Translation
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Tip Example section --}}
            <div class="container mt-5">
                <div class="mb-4">
                    <label for="title_en" class="form-label">Tip  Example (English) <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tipexample" name="data[en][tipexample]"
                        value="{{ $advice['main_data']['tip_example'] }}" >
                </div>

                <ul class="nav nav-tabs" id="languageTab" role="tablist">
                    @foreach ($advice['translations']['tip_example'] as $translation)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                data-bs-target="#tipexample-{{ $translation['locale'] }}" type="button"
                                role="tab">{{ $translation['name_locale'] }}</button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach ($advice['translations']['tip_example'] as $translation)
                        <!-- Tab -->
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                            id="tipexample-{{ $translation['locale'] }}" role="tabpanel">
                            <div class="mt-3">
                                <label for="title_id" class="form-label">Tip Example
                                    ({{ $translation['name_locale'] }})
                                </label>
                                <textarea class="form-control"  rows="4"
                                id="tipexample_{{ $translation['locale'] }}"
                                name="data[{{ $translation['locale'] }}][tipexample]"
                                >{{ $translation['title'] }}</textarea>
                            </div>
                            <div class="translation-button">
                                <button type="button" class="btn btn-primary"
                                    onclick="
                                                                        getTranslation(
                                                                            'tipexample',
                                                                            'tipexample_{{ $translation['locale'] }}',
                                                                            '{{ $translation['locale'] }}',
                                                                        )">
                                    Get Automatic Translation
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function getTranslation(from_name, into_name, locale) {

            let inputValue = document.getElementById(from_name).value;

            $.ajax({
                url: '{{ route('translate') }}', // Route to handle the request
                type: 'GET', // HTTP method
                data: {
                    text: inputValue,
                    locale: locale
                },
                success: function(response) {
                    console.log("Finished generate")
                    if (response.success) {
                        $('#' + into_name).val(response.data);
                        console.log("Generate success");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error changing language:', error);
                }
            });
        }
    </script>
</body>

</html>
