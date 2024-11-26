<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @if(session('confirm'))
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                Swal.fire({
                    title:"Successfully Login!",
                    text: "welcome Login",
                    icon: "success"
                })
            })
        </script>
    @endif
    <h1>This is Dashboard</h1>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>