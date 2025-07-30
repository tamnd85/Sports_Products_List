<!DOCTYPE html>
    <html>
        <head>
            <title>Sports Products App</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <script src="//unpkg.com/alpinejs" defer></script>

            {{--blade-formatter-disable--}}
            <style type="text/tailwindcss">
                .btn {
                    @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-100 ;
                }

                .btn1 {
                    @apply rounded-md px-2 py-1 text-center font-medium text-green-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-100 ;
                }

                .btn2 {
                    @apply rounded-md px-2 py-1 text-center font-medium text-red-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-100 ;
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
            <h1>@yield('title')</h1>
            @yield('content')
        </body>
    </html>
