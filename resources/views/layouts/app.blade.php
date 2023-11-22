<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito:400,700&display=swap" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="font-[Nunito] flex flex-col justify-between h-screen">
    <div class="bg-red-600 text-gray-300 py-8 shadow-xl">
        <div class="max-w-5xl mx-auto px-3">
            <div class="flex justify-between items-center">
                <a href="/">
                    <img  class="h-[200px]" src="https://ih1.redbubble.net/image.2146194673.8702/flat,750x,075,f-pad,750x1000,f8f8f8.jpg" alt="">
                    </a>
                
                <nav class="space-x-3 text-black">
                    <a class="hover:underline underline-offset-8" href="/">Home</a>
                    <a class="hover:underline underline-offset-8" href="/weightclass">Weightclass</a>
                    <a class="hover:underline underline-offset-8" href="/fighters">Figthers</a>
                    
                    <a class="hover:underline underline-offset-8" href="/a-propos">A propos</a>
                    @auth
                        <a href="/logout"> {{Auth::user()->email}} </a>
                        @else
                        <a href="/login">Connexion</a>
                    @endauth
                </nav>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-3 py-8 w-full">
        @yield('content')
    </div>

    <footer class="bg-red-600 text-gray-300 py-8">
        <div class="max-w-5xl mx-auto px-3">
            <p class="text-center text-xl text-black">Fightflix &copy; {{ date('Y') }}</p>
        </div>
    </footer>
</body>
</html>
