<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            background: #212A1E;
        }
        @media only screen and (max-width: 445px) {
            body {
                margin: 0 !important;
                padding: 0 !important;
            }
        }
    </style>
</head>
<body>
<div id="app">
    <home></home>
</div>
</body>
</html>