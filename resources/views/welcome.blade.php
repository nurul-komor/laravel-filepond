<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.11/dist/filepond-plugin-image-preview.min.css">
    <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
</head>


<body>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" class="filepond" name="filepond" multiple data-allow-reorder="true"
            data-max-file-size="3MB" data-max-files="3">
        <button type="submit">Submit</button>
    </form>
    {{-- jj --}}
    <script
        src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.11/dist/filepond-plugin-image-preview.min.js">
    </script>
    <script src="
            https://cdn.jsdelivr.net/npm/filepond-plugin-image-edit@1.6.3/dist/filepond-plugin-image-edit.min.js
            "></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        // import * as FilePond from "filepond"
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            // FilePondPluginImageExifOrientation,
            // FilePondPluginFileValidateSize,
            FilePondPluginImageEdit
        );
        FilePond.setOptions({
            server: {
                url: "/upload",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }
        });

        FilePond.create(document.querySelector(".filepond"));
        // alert()
    </script>
</body>

</html>
