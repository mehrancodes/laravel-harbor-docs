@extends('_layouts.main')

@section('body')
    <header class="text-center py-10">
        <!-- Logo -->
        <div class="sm:flex sm:justify-center sm:items-center">
            <img class="h-16 sm:h-24 flex sm:flex-none items-center mx-auto sm:mx-0" src="/assets/images/logo-veyoze.png" alt="{{ $page->siteName }} Logo">
            <span class="mx-6 text-5xl font-bold text-white">+</span>
            <a title="Visit Forge Homepage" class="flex sm:items-center justify-center bg-gray-100 p-2 rounded-lg w-32 mx-auto sm:mx-0" href="https://forge.laravel.com">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 109 21" class="h-8 text-teal-400"><path d="M38.971.659c2.062 0 3.013.37 3.595 1.11.846 1.11 1.322 3.33-.053 8.775s-2.907 7.613-4.335 8.776c-.952.74-2.115 1.11-4.176 1.11h-6.608c-2.062 0-3.066-.37-3.595-1.11-.846-1.11-1.322-3.33.106-8.776 1.374-5.445 2.96-7.612 4.388-8.775.952-.74 2.115-1.11 4.176-1.11h6.502zM29.35 15.619c.106.159.37.212 1.216.212h2.537c.846 0 1.163-.053 1.375-.212.264-.211.74-.74 1.797-5.075 1.11-4.335.899-4.863.74-5.075-.106-.159-.37-.211-1.216-.211h-2.485c-.846 0-1.163.053-1.374.211-.264.211-.74.74-1.797 5.075-1.163 4.388-.952 4.864-.793 5.075zm25.639-1.586c-.211-.264-.423-.37-1.692-.37h-2.485a.62.62 0 0 0-.581.476l-1.427 5.815a.62.62 0 0 1-.582.476h-5.128c-.264 0-.423-.212-.37-.476l4.705-18.82a.62.62 0 0 1 .582-.476h12.053c1.956 0 3.013.264 3.595 1.004.634.899.846 1.85.159 4.599-.899 3.701-2.273 4.758-4.652 5.234v.053c1.85.476 2.855 1.11 2.22 3.965l-.793 4.388c-.053.264-.317.529-.581.529h-5.234c-.212 0-.423-.159-.37-.423l.687-3.965c.211-1.427.106-1.692-.106-2.009zm-.37-4.652c1.11 0 1.427-.053 1.639-.211.37-.264.634-.74.899-1.903s.212-1.586 0-1.85c-.159-.159-.423-.211-1.533-.211h-2.749a.62.62 0 0 0-.581.476L51.5 8.958c-.053.264.106.476.37.476h2.749v-.053zM80.47.5c2.115 0 3.225.264 3.859 1.004.74.899 1.004 2.273.423 5.339a.62.62 0 0 1-.582.476h-4.916c-.264 0-.423-.211-.37-.423.212-1.216-.053-1.374-.212-1.586-.106-.159-.317-.211-1.216-.211h-2.537c-.899 0-1.163.053-1.374.211-.317.264-.899 1.163-1.85 5.181s-.793 4.969-.634 5.234c.106.159.37.211 1.269.211h2.696c.793 0 1.11-.053 1.322-.211.264-.211.793-.74 1.11-2.168l.053-.159h-3.806c-.264 0-.423-.211-.37-.476l.74-3.172a.62.62 0 0 1 .582-.476H83.8c.264 0 .423.211.37.476l-.476 1.956c-1.11 4.811-2.432 6.502-3.806 7.612-1.004.846-2.432 1.163-4.282 1.163h-6.608c-2.062 0-3.066-.37-3.648-1.163-.899-1.163-1.374-3.33-.053-8.828s2.855-7.718 4.282-8.828C70.531.87 71.694.5 73.756.5h6.714zm20.617 19.983H85.281c-.264 0-.423-.212-.37-.476L89.351.976A.62.62 0 0 1 89.933.5h18.396c.318 0 .476.317.265.634-.793 1.269-3.859 3.965-7.296 3.965h-6.396a.62.62 0 0 0-.581.476l-.476 2.115c-.053.264.106.476.37.476h8.616c.265 0 .423.211.371.476l-.741 3.33a.62.62 0 0 1-.581.476h-8.617a.62.62 0 0 0-.582.476l-.582 2.432c-.053.264.106.476.37.476h9.674c.265 0 .423.211.37.476l-.846 3.648c-.052.317-.317.529-.581.529zM25.121.659H3.446a.62.62 0 0 0-.582.476l-.529 1.903c-.053.211.053.37.211.476.846.264 5.392.37 4.705 2.908l-.159.687-1.85 6.925-.159.687c-.687 2.537-3.119 2.643-4.123 2.908-.211.053-.37.264-.423.476L.01 20.007c-.053.264.106.476.37.476h8.828a.62.62 0 0 0 .582-.476l1.586-6.132a.62.62 0 0 1 .582-.476h5.657a.62.62 0 0 0 .581-.476l.846-3.278c.053-.264-.106-.476-.37-.476h-5.656c-.264 0-.423-.211-.37-.476l.793-2.96a.62.62 0 0 1 .582-.476h8.511a.62.62 0 0 0 .581-.476l2.273-3.595c.106-.317 0-.529-.264-.529z" fill="currentColor"></path></svg>
            </a>
        </div>

        <!-- Heading -->
        <h1 class="text-4xl md:text-6xl font-bold mt-8 w-72">
            <div class="text-white text-5xl md:text-6xl">On-Demand Deployments</div>
            <div class="text-white">with all setup you need</div>
        </h1>

        <!-- Description -->
        <p class="text-md mt-2">
            <div class="text-white">Veyoze is a cli that helps you quickly preview your pull requests</div>
            <div class="text-white">on Forge before you merge it, with minimum setup required.</div>
        </p>

        <div class="mt-8">
            <div class="flex justify-center my-10">
                <a href="/docs/introduction" title="{{ $page->siteName }} getting started" class="bg-white hover:bg-gray-200 text-blue-900 text-lg font-bold rounded-lg mr-4 py-3 px-8">Get Started</a>

                <a href="https://github.com/mehrancodes/veyoze" title="Source Code" class="border-2 border-white text-white text-lg font-bold hover:text-white rounded-lg mr-4 py-3 px-8">Source Code</a>
            </div>
        </div>
    </header>
    <section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
        <hr class="block my-8 border lg:hidden">

        <div class="md:flex -mx-2 -mx-4">
            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <h3 id="intro-laravel" class="text-2xl mb-0 text-white">Automated Provisioning</h3>

                <p class="text-gray-300">Veyoze automates the setup of Preview Environments, enabling your team to focus on building and testing rather than configuration and deployment.</p>
            </div>

            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <h3 id="intro-markdown" class="text-2xl mb-0 text-white">Speed and Efficiency</h3>

                <p class="text-gray-300"> By reducing the time required to test new features, Veyoze empowers teams to increase their development velocity significantly.</p>
            </div>

            <div class="mx-3 px-2 md:w-1/3">
                <h3 id="intro-mix" class="text-2xl mb-0 text-white">Quality Assurance</h3>

                <p class="text-gray-300">Veyoze's pre-merge testing capabilities ensure that every feature is rigorously evaluated in a production-like setting, minimizing the risk of post-merge issues.</p>
            </div>
        </div>
    </section>
@endsection
