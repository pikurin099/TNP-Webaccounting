<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/gridjs/dist/theme/mermaid.css">
    @vite(['resources/js/app.js', 'resources/js/gridjs.js'])
</head>
<body>
    <h1>現金出納帳</h1>
    <div id="table"></div>
    <script>
        const grid = new Grid({ // 修正: Gird -> Grid
            data: [
                ['John', 'john@example.com'],
                ['Mike', 'mike@gmail.com']
            ]
        }).updateConfig({
            columns:['Name','Email','Phone Number'],
        }).render(document.getElementById('table'));
    </script>
</body>
</html>
