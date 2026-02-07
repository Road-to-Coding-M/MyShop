<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Tienda Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            500: '#6997ca',
                            600: '#4b7db2',
                            700: '#316298',
                        },
                        secondary: {
                            500: '#63d1c1',
                            600: '#41b8a5',
                        }
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css'])
</head>