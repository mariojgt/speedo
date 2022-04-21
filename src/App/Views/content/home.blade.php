@extends('components.layout')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
            <img src="public/img/logo_small.png" class="max-w-sm rounded-lg shadow-2xl" alt="Tailwind CSS hero component">

            <div>
                <h1 class="text-5xl font-bold">Welcome to speedo!</h1>
                <p class="py-6">You have successfully install speedo, out of the box it comes with, tailwind, daisy
                    ui, vue js 3 and laravel blade and eloquent database relation.</p>
                <a class="btn btn-primary" href="https://github.com/mariojgt/speedo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 p-6">
        <div>
            <h1 class="text-5xl font-bold">Next!</h1>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 p-6">

        <div class="card w-full bg-neutral text-nubg-neutral-content p-6">
            <div class="card-body">
                <h2 class="card-title">Route Update</h2>
                <p>You can update your routes inside the folder <small class="bg-warning text-warning-content" >project/src/routes/web.php</small></p>
                <p>By default we have the web.php but you can add multiples, but they need to follow the same structure</p>
                <div class="mockup-code">
                    <pre data-prefix="1"><code>return [ </code></pre>
                    <pre data-prefix="2"><code>    '/index' => [ </code></pre>
                    <pre data-prefix="3"><code>        'method'     => 'get', // Post, Get, Delete etc</code></pre>
                    <pre data-prefix="4"><code>        'class'      => HomeController::class, // The controller</code></pre>
                    <pre data-prefix="5"><code>        'function'   => 'index', // The fuction or method you want to render</code></pre>
                    <pre data-prefix="6"><code>        'middleware' => 'web', // middleware</code></pre>
                    <pre data-prefix="7"><code>        'name_route' => 'home' // name route</code></pre>
                    <pre data-prefix="8"><code>    ], </code></pre>
                    <pre data-prefix="9"><code>]; </code></pre>
                  </div>
            </div>
        </div>

        <div class="card w-full bg-neutral text-nubg-neutral-content">
            <div class="card-body">
                <h2 class="card-title">Midlewhere</h2>
                <p>You can update your midlewhere inside the folder <small class="bg-warning text-warning-content" >project/src/middleware/web.php</small></p>
                <p>Middleware they use a interface to extend the methods buy default not extra checks are made so fell free to implement your custom check.</p>
                <div class="mockup-code">
                    <pre data-prefix="1"><code>    </code> </pre>
                    <pre data-prefix="1"><code></code> </pre>
                    <pre data-prefix="1"><code>    namespace Speedo\middleware;</code> </pre>
                    <pre data-prefix="1"><code>    </code> </pre>
                    <pre data-prefix="1"><code>    // Import the middlewareInterface</code> </pre>
                    <pre data-prefix="1"><code>    use Speedo\bootstrap\middlewareInterface;</code> </pre>
                    <pre data-prefix="1"><code>    </code> </pre>
                    <pre data-prefix="1"><code>    class web implements middlewareInterface</code> </pre>
                    <pre data-prefix="1"><code>    {</code> </pre>
                    <pre data-prefix="1"><code>        /**</code> </pre>
                    <pre data-prefix="1"><code>         * You middleware check in here</code> </pre>
                    <pre data-prefix="1"><code>         * @return [type]</code> </pre>
                    <pre data-prefix="1"><code>         */</code> </pre>
                    <pre data-prefix="1"><code>        public function check()</code> </pre>
                    <pre data-prefix="1"><code>        {</code> </pre>
                    <pre data-prefix="1"><code>            // Check if the user is logged in</code> </pre>
                    <pre data-prefix="1"><code>            // if (!isset($_SESSION['user'])) {</code> </pre>
                    <pre data-prefix="1"><code>            //     // Redirect to the login page</code> </pre>
                    <pre data-prefix="1"><code>            //     header('Location: /login');</code> </pre>
                    <pre data-prefix="1"><code>            //     exit;</code> </pre>
                    <pre data-prefix="1"><code>            // }</code> </pre>
                    <pre data-prefix="1"><code>            return true;</code> </pre>
                    <pre data-prefix="1"><code>        }</code> </pre>
                    <pre data-prefix="1"><code>    </code> </pre>
                    <pre data-prefix="1"><code>        public function error()</code> </pre>
                    <pre data-prefix="1"><code>        {</code> </pre>
                    <pre data-prefix="1"><code>            // Redirect to the login page</code> </pre>
                    <pre data-prefix="1"><code>            header('Location: /login');</code> </pre>
                    <pre data-prefix="1"><code>            exit;</code> </pre>
                    <pre data-prefix="1"><code>        }</code> </pre>
                    <pre data-prefix="1"><code>    }</code> </pre>
                  </div>
            </div>
        </div>
    </div>
@endsection
