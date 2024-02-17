@extends('_layouts.main')

@section('body')
    <header class="text-center py-10">
        <!-- Logo -->
        <div class="sm:flex sm:justify-center sm:items-center">
            <img class="h-16 sm:h-24 flex sm:flex-none items-center mx-auto sm:mx-0" src="/assets/images/logo-veyoze.png" alt="{{ $page->siteName }} Logo">
            <span class="mx-6 text-5xl font-bold text-gray-900">+</span>
            <a title="Visit Forge Homepage" class="flex sm:items-center justify-center bg-teal-accent-100 p-2 rounded-lg w-32 mx-auto sm:mx-0" href="https://forge.laravel.com">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 109 21" class="h-8 text-teal-400"><path d="M38.971.659c2.062 0 3.013.37 3.595 1.11.846 1.11 1.322 3.33-.053 8.775s-2.907 7.613-4.335 8.776c-.952.74-2.115 1.11-4.176 1.11h-6.608c-2.062 0-3.066-.37-3.595-1.11-.846-1.11-1.322-3.33.106-8.776 1.374-5.445 2.96-7.612 4.388-8.775.952-.74 2.115-1.11 4.176-1.11h6.502zM29.35 15.619c.106.159.37.212 1.216.212h2.537c.846 0 1.163-.053 1.375-.212.264-.211.74-.74 1.797-5.075 1.11-4.335.899-4.863.74-5.075-.106-.159-.37-.211-1.216-.211h-2.485c-.846 0-1.163.053-1.374.211-.264.211-.74.74-1.797 5.075-1.163 4.388-.952 4.864-.793 5.075zm25.639-1.586c-.211-.264-.423-.37-1.692-.37h-2.485a.62.62 0 0 0-.581.476l-1.427 5.815a.62.62 0 0 1-.582.476h-5.128c-.264 0-.423-.212-.37-.476l4.705-18.82a.62.62 0 0 1 .582-.476h12.053c1.956 0 3.013.264 3.595 1.004.634.899.846 1.85.159 4.599-.899 3.701-2.273 4.758-4.652 5.234v.053c1.85.476 2.855 1.11 2.22 3.965l-.793 4.388c-.053.264-.317.529-.581.529h-5.234c-.212 0-.423-.159-.37-.423l.687-3.965c.211-1.427.106-1.692-.106-2.009zm-.37-4.652c1.11 0 1.427-.053 1.639-.211.37-.264.634-.74.899-1.903s.212-1.586 0-1.85c-.159-.159-.423-.211-1.533-.211h-2.749a.62.62 0 0 0-.581.476L51.5 8.958c-.053.264.106.476.37.476h2.749v-.053zM80.47.5c2.115 0 3.225.264 3.859 1.004.74.899 1.004 2.273.423 5.339a.62.62 0 0 1-.582.476h-4.916c-.264 0-.423-.211-.37-.423.212-1.216-.053-1.374-.212-1.586-.106-.159-.317-.211-1.216-.211h-2.537c-.899 0-1.163.053-1.374.211-.317.264-.899 1.163-1.85 5.181s-.793 4.969-.634 5.234c.106.159.37.211 1.269.211h2.696c.793 0 1.11-.053 1.322-.211.264-.211.793-.74 1.11-2.168l.053-.159h-3.806c-.264 0-.423-.211-.37-.476l.74-3.172a.62.62 0 0 1 .582-.476H83.8c.264 0 .423.211.37.476l-.476 1.956c-1.11 4.811-2.432 6.502-3.806 7.612-1.004.846-2.432 1.163-4.282 1.163h-6.608c-2.062 0-3.066-.37-3.648-1.163-.899-1.163-1.374-3.33-.053-8.828s2.855-7.718 4.282-8.828C70.531.87 71.694.5 73.756.5h6.714zm20.617 19.983H85.281c-.264 0-.423-.212-.37-.476L89.351.976A.62.62 0 0 1 89.933.5h18.396c.318 0 .476.317.265.634-.793 1.269-3.859 3.965-7.296 3.965h-6.396a.62.62 0 0 0-.581.476l-.476 2.115c-.053.264.106.476.37.476h8.616c.265 0 .423.211.371.476l-.741 3.33a.62.62 0 0 1-.581.476h-8.617a.62.62 0 0 0-.582.476l-.582 2.432c-.053.264.106.476.37.476h9.674c.265 0 .423.211.37.476l-.846 3.648c-.052.317-.317.529-.581.529zM25.121.659H3.446a.62.62 0 0 0-.582.476l-.529 1.903c-.053.211.053.37.211.476.846.264 5.392.37 4.705 2.908l-.159.687-1.85 6.925-.159.687c-.687 2.537-3.119 2.643-4.123 2.908-.211.053-.37.264-.423.476L.01 20.007c-.053.264.106.476.37.476h8.828a.62.62 0 0 0 .582-.476l1.586-6.132a.62.62 0 0 1 .582-.476h5.657a.62.62 0 0 0 .581-.476l.846-3.278c.053-.264-.106-.476-.37-.476h-5.656c-.264 0-.423-.211-.37-.476l.793-2.96a.62.62 0 0 1 .582-.476h8.511a.62.62 0 0 0 .581-.476l2.273-3.595c.106-.317 0-.529-.264-.529z" fill="currentColor"></path></svg>
            </a>
        </div>

        <!-- Heading -->
        <h1 class="text-4xl md:text-6xl font-bold mt-8 w-72">
            <div class="text-gray-900 text-5xl md:text-6xl">On-Demand Site Provisions</div>
            <div class="text-gray-900">with all setup you need</div>
        </h1>

        <!-- Description -->
        <p class="text-md mt-2">
            <div class="text-gray-900">Veyoze is a cli that helps you quickly preview your pull requests</div>
            <div class="text-gray-900">on Laravel Forge before you merge it, with minimum setup required.</div>
        </p>

        <div class="mt-8">
            <div class="md:flex md:justify-center my-10">
                <a href="/docs/introduction" title="{{ $page->siteName }} getting started" class="block sm:inline-block bg-gray-900 hover:bg-gray-800 text-white hover:text-white text-lg font-bold rounded-lg md:mr-4 py-3 px-8">Get Started</a>

                <a href="https://github.com/mehrancodes/veyoze" title="Source Code" class="block mt-6 sm:mt-0 sm:inline-block border-2 border-gray-900 text-gray-900 text-lg font-bold rounded-lg md:mr-4 py-3 px-8">Source Code</a>
            </div>
        </div>
    </header>

    <section class="flex justify-center items-center md:w-3/4 mt-5 mb-16 md:my-10 bg-gray-900 px-8 md:px-16 py-8 shadow-2xl rounded-3xl text-white mx-auto">
        <div>
            <p>I've been using Laravel Forge server management since 2020. As well as great support for Laravel projects, it makes setting up and running your projects super easy. Using the Forge's powerful API, Veyoze made it easy to automate the whole site provisioning on my Forge server and let me deploy my projects with support for Forge setup automation. Whether it is a monolithic or client-server project.</p>
            <div class="flex justify-end items-center gap-4">
                <img class="w-10 h-10 rounded-full" src="/assets/images/mehran-rasulian-image.jpeg" alt="Mehran rasulian image">
                <div class="font-medium dark:text-white">
                    <div>Mehran Rasulian</div>
                    <div class="text-sm text-gray-400 dark:text-gray-400">Veyoze Creator</div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 pt-12 pb-8 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:pb-12 lg:pt-16">
        <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
            <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                    <span class="relative inline-block">
                      <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                        <defs>
                          <pattern id="07690130-d013-42bc-83f4-90de7ac68f76" x="0" y="0" width=".135" height=".30">
                            <circle cx="1" cy="1" r=".7"></circle>
                          </pattern>
                        </defs>
                        <rect fill="url(#07690130-d013-42bc-83f4-90de7ac68f76)" width="52" height="24"></rect>
                      </svg>
                      <span class="relative">Simplifying</span>
                    </span>
                Deployment with Laravel <span class="text-teal-accent-700">Forge</span></h2>
        </div>
        <div class="grid gap-12 row-gap-8 lg:grid-cols-3">
            <div class="flex">
                <div class="mr-4">
                    <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2 font-semibold leading-5">Seamless Forge Integration</h6>
                    <p class="text-sm text-gray-900">
                        Veyoze makes creating and configuring sites on Laravel Forge a breeze. Interacting seamlessly with your Forge account via the Forge API token.
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="mr-4">
                    <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2 font-semibold leading-5">Ready For Laravel & Nuxt.js</h6>
                    <p class="text-sm text-gray-900">
                        Veyoze handles all the necessary steps to deploy your projects, whether it's a Laravel application or a Nuxt.js frontend. Enjoy automated deployment workflows tailored to your specific project needs.
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="mr-4">
                    <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2 font-semibold leading-5">Customizable Deployment Workflows</h6>
                    <p class="text-sm text-gray-900">
                        Customize deployment workflows with ease. From Nginx templates to SSL-enabled subdomains, Veyoze puts you in control of your deployment environment.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid gap-12 row-gap-8 lg:grid-cols-3">
            <div class="flex">
                <div class="mr-4">
                    <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2 font-semibold leading-5">Environment Keys Automated</h6>
                    <p class="text-sm text-gray-900">
                        Veyoze simplifies the process of passing environment keys securely to your Forge site. So you don't need to add them manually after you deployed your project.
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="mr-4">
                    <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2 font-semibold leading-5">Flexible Deployment Scripts</h6>
                    <p class="text-sm text-gray-900">
                        Veyoze allows you to define custom deploy scripts tailored to your project's unique requirements.
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="mr-4">
                    <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
                        <svg class="w-8 h-8 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                        </svg>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2 font-semibold leading-5">Post-Deployment Actions</h6>
                    <p class="text-sm text-gray-900">
                        After deploying with Veyoze, effortlessly run commands, or enable the task scheduler.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 pt-12 pb-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:pb-20 lg:pt-16">
        <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
            <div>
                <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                    Deploy Faster with Veyoze 🚀
                </p>
            </div>
            <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                    <span class="relative inline-block">
                      <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                        <defs>
                          <pattern id="b902cd03-49cc-4166-a0ae-4ca1c31cedba" x="0" y="0" width=".135" height=".30">
                            <circle cx="1" cy="1" r=".7"></circle>
                          </pattern>
                        </defs>
                        <rect fill="url(#b902cd03-49cc-4166-a0ae-4ca1c31cedba)" width="52" height="24"></rect>
                      </svg>
                      <span class="relative">How</span>
                    </span>
                Veyoze Works: A Quick and Easy Guide!
            </h2>
            <div>
                <p class="text-base text-gray-700 md:text-lg mt-10">Meet John 👨🏻‍💻</p>
                <p class="text-base text-gray-700 md:text-lg">
                    Meet John, our efficient developer ready to deploy changes seamlessly using Veyoze. Let's take a look at how John can make the deployment process a happy and fast experience!
                </p>
            </div>
        </div>

        <div class="grid max-w-2xl mx-auto">
            <div class="flex">
                <div class="flex flex-col items-center mr-6">
                    <div class="w-px h-10 opacity-0 sm:h-full"></div>
                    <div>
                        <div class="flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full">
                            1
                        </div>
                    </div>
                    <div class="w-px h-full bg-gray-300"></div>
                </div>
                <div class="flex flex-col pb-6 sm:items-center sm:flex-row sm:pb-0">
                    <div class="sm:mr-5">
                        <div class="flex items-center justify-center w-16 h-16 my-3 rounded-full bg-indigo-50 sm:w-24 sm:h-24">
                            <svg class="w-7 h-7 sm:w-10 sm:h-10 text-deep-purple-accent-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1 .9-2.7L5.737 5.1a3.375 3.375 0 0 1 2.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 0 1 .9 2.7m0 0a3 3 0 0 1-3 3m0 3h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Zm-3 6h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-xl font-semibold sm:text-base">Connect Forge Server</p>
                        <p class="text-sm text-gray-700">
                            John grabs the Forge API Token and Server ID from his Forge account. This information is essential for Veyoze to communicate with the Forge server.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="flex flex-col items-center mr-6">
                    <div class="w-px h-10 bg-gray-300 sm:h-full"></div>
                    <div>
                        <div class="flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full">
                            2
                        </div>
                    </div>
                    <div class="w-px h-full bg-gray-300"></div>
                </div>
                <div class="flex flex-col pb-6 sm:items-center sm:flex-row sm:pb-0">
                    <div class="sm:mr-5">
                        <div class="flex items-center justify-center w-16 h-16 my-3 rounded-full bg-indigo-50 sm:w-24 sm:h-24">
                            <svg class="w-7 h-7 sm:w-10 sm:h-10 text-deep-purple-accent-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                            </svg>

                        </div>
                    </div>
                    <div>
                        <p class="text-xl font-semibold sm:text-base">Setup GitHub Action Workflow</p>
                        <p class="text-sm text-gray-700">
                            John sets up a GitHub Action Workflow to trigger the Veyoze CLI either manually or automatically when a pull request is created. This ensures a streamlined deployment process.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="flex flex-col items-center mr-6">
                    <div class="w-px h-10 bg-gray-300 sm:h-full"></div>
                    <div>
                        <div class="flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full">
                            3
                        </div>
                    </div>
                    <div class="w-px h-full opacity-0"></div>
                </div>
                <div class="flex flex-col pb-6 sm:items-center sm:flex-row sm:pb-0">
                    <div class="sm:mr-5">
                        <div class="flex items-center justify-center w-16 h-16 my-3 rounded-full bg-indigo-50 sm:w-24 sm:h-24">
                            <svg class="w-7 h-7 sm:w-10 sm:h-10 text-deep-purple-accent-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-xl font-semibold sm:text-base">Run Veyoze</p>
                        <p class="text-sm text-gray-700">
                            With everything in place, John simply triggers Veyoze from the pull request. Veyoze takes charge, effortlessly setting up a new site on Forge with the latest changes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="flex flex-col items-center mr-6">
                    <div class="w-px h-10 bg-gray-300 sm:h-full"></div>
                    <div>
                        <div class="flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full">
                            4
                        </div>
                    </div>
                    <div class="w-px h-full opacity-0"></div>
                </div>
                <div class="flex flex-col pb-6 sm:items-center sm:flex-row sm:pb-0">
                    <div class="sm:mr-5">
                        <div class="flex items-center justify-center w-16 h-16 my-3 rounded-full bg-indigo-50 sm:w-24 sm:h-24">
                            <svg class="w-7 h-7 sm:w-10 sm:h-10 text-deep-purple-accent-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-xl font-semibold sm:text-base">Site Is Ready For QA</p>
                        <p class="text-sm text-gray-700">
                            John receives the site link and is ready to kick off QA for the new changes. Once QA is complete and the pull request is merged, the site gracefully goes down, ensuring a clean and efficient deployment cycle.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
            <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">

                <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-5xl md:mx-auto">
                  <span class="relative inline-block">
                    <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                      <defs>
                        <pattern id="70326c9b-4a0f-429b-9c76-792941e326d5" x="0" y="0" width=".135" height=".30">
                          <circle cx="1" cy="1" r=".7"></circle>
                        </pattern>
                      </defs>
                      <rect fill="url(#70326c9b-4a0f-429b-9c76-792941e326d5)" width="52" height="24"></rect>
                    </svg>
                    <span class="relative">FAQs</span>
                  </span>
                </h2>
            </div>
        </div>
        <div class="max-w-screen-xl sm:mx-auto">
            <div class="grid grid-cols-1 gap-16 row-gap-8 lg:grid-cols-2">
                <div class="space-y-8">
                    <div>
                        <p class="mb-4 text-xl font-medium">
                            Can I use Veyoze for different project types?
                        </p>
                        <p class="text-gray-700">
                            Absolutely! Veyoze is versatile and supports the automated deployment of various project types, including Laravel applications and Nuxt.js with support for SSR.<br />
                            <br />
                            Its flexibility allows you to adapt deployment workflows to the specific needs of your projects.
                        </p>
                    </div>
                    <div>
                        <p class="mb-4 text-xl font-medium">
                            Is Veyoze secure for handling environment keys?
                        </p>
                        <p class="text-gray-700">
                            Yes, Veyoze prioritizes security. While it doesn't make environment keys secure by itself, it recommends using GitHub Actions secrets to securely pass sensitive information to your Forge site during deployment.
                        </p>
                    </div>
                    <div>
                        <p class="mb-4 text-xl font-medium">
                            Can I define post-deployment tasks with Veyoze?
                        </p>
                        <p class="text-gray-700">
                            Certainly! Veyoze allows you to define custom commands to run after the deployment, as well as enabling task scheduler for your Laravel projects.<br />

                            <br />
                            You can automate post-deployment tasks, such as database migrations or cache clearing, ensuring your applications run smoothly without manual intervention.
                        </p>
                    </div>
                </div>
                <div class="space-y-8">
                    <div>
                        <p class="mb-4 text-xl font-medium">
                            Can I use Veyoze with other Git providers such as GitLab?
                        </p>
                        <p class="text-gray-700">
                            While Veyoze is primarily used with GitHub Actions, it can be utilized with any Git provider that is supported by Laravel Forge.<br />
                            <br />
                            Simply set up your deployment workflows accordingly to accommodate your preferred Git provider.
                        </p>
                    </div>
                    <div>
                        <p class="mb-4 text-xl font-medium">
                            Can I use Veyoze locally to provision a site?
                        </p>
                        <p class="text-gray-700">
                            Yes, Veyoze can be used locally to provision a site. You can install Veyoze on your local machine and utilize its functionalities to provision a Forge site, deploy the project, and teardown a site directly from your command line interface.
                        </p>
                    </div>
                    <div>
                        <p class="mb-4 text-xl font-medium">
                            Can I use Veyoze for project demos?
                        </p>
                        <p class="text-gray-700">
                            Absolutely! Veyoze is your go-to for setting up quick project demos. Show off your features or share your work hassle-free.<br />
                            <br />
                            Veyoze takes care of the nitty-gritty like server setup and deployment workflows, so you can focus on wowing your audience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        <div class="text-center pt-5 pb-10 border-t">
            <p class="text-sm text-gray-600">
                © Veyoze 2024. All rights reserved.
            </p>
        </div>
    </footer>
@endsection
