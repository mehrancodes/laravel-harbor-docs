@extends('_layouts.main')

@section('body')
    <header class="text-center py-10">
        <!-- Logo -->
        <div>
            <img class="mx-auto w-56 h-auto" src="/assets/images/logo-veyoze.png" alt="{{ $page->siteName }} Logo" class="mx-auto">
        </div>

        <!-- Heading -->
        <h1 class="text-6xl font-black mt-3 w-72">
            <div class="text-white">On-Demand Deployments</div>
            <div class="text-white">with all setup you need</div>
        </h1>

        <!-- Description -->
        <p class="text-md mt-2">
            <div class="text-white">Veyoze is a cli that helps you quickly preview your pull requests</div>
            <div class="text-white">on Forge before you merge it, with minimum setup required.</div>
        </p>

        <div class="mt-8">
            <div class="flex justify-center my-10">
                <a href="/docs/getting-started" title="{{ $page->siteName }} getting started" class="bg-white hover:bg-gray-200 text-blue-900 text-lg font-bold rounded-lg mr-4 py-3 px-8">Get Started</a>

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
