<!DOCTYPE html>
    <html>
        <head>
            <title>Sports Products App</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <script src="//unpkg.com/alpinejs" defer></script>

            {{--blade-formatter-disable--}}
            <style type="text/tailwindcss">
                .btn {
                    @apply rounded-md px-4 py-2 text-center font-medium text-white shadow-sm ring-1 ring-slate-700/10 hover:bg-blue-700 bg-blue-600;
                }

                .btn1 {
                    @apply rounded-md px-4 py-2 text-center font-medium text-white shadow-sm ring-1 ring-slate-700/10 hover:bg-green-700 bg-green-600;
                }

                .btn2 {
                    @apply rounded-md px-4 py-2 text-center font-medium text-white shadow-sm ring-1 ring-slate-700/10 hover:bg-red-700 bg-red-600;
                }

                .link {
                    @apply font-medium text-blue-700 underline decoration-pink-500;
                }

                .link1 {
                    @apply font-medium text-red-700 underline decoration-pink-500;
                }

                label{
                    @apply block uppercase text-slate-700 mb-2;
                }

                input,
                textarea {
                    @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none;
                }

                .error {
                @apply text-red-500 text-sm;
                }
            </style>
            {{--blade-formatter-enable--}}
            @yield('styles')
        </head>
        <body>
            <header class="bg-gray-100 py-6 shadow">
                <div class="container mx-auto px-4">
                    <h1 class="text-3xl font-bold text-gray-800">@yield('title')</h1>
                </div>
            </header>
            @yield('content')
        </body>
    </html>
