<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Upload Image/Video</h2>
    
    <form id="uploadForm" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="file" class="form-label">Choose File</label>
            <input type="file" id="file" name="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <div id="message" class="mt-3"></div>
</div>

<script>
$(document).ready(function () {
    $("#uploadForm").on("submit", function (e) {
        e.preventDefault();
        
        var formData = new FormData();
        formData.append("file", $("#file")[0].files[0]);

        $.ajax({
            url: "{{ route('upload') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                $("#message").html('<div class="alert alert-success">' + response.message + '</div>');
            },
            error: function (xhr) {
                $("#message").html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
            }
        });
    });
});
</script>

</body>
</html>
