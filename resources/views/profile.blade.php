<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <title>RecRouter</title>
</head>
<body>
<!-- <nav class="bg-gradient-to-r from-cyan-500 to-gray-500">
  <div class="px-2 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
    <div class="ml-2">
          <div class="text-white text-4xl font-sans font-medium">RecRouter</div>
    </div>
      </div>
    </div>
  </div>
</nav> -->
@if(session()->has('message'))
              <div aria-live="assertive" class="sessionAlert z-40 pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
                <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
                  <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="p-4">
                      <div class="flex items-start">
                        <div class="flex-shrink-0">
                          <!-- Heroicon name: outline/check-circle -->
                          <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                          <p class="text-sm font-medium text-gray-900">{{ session()->get('message') }}!</p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                          <button type="button" class=" alertClose inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                            <span class="sr-only">Close</span>
                            <!-- Heroicon name: mini/x-mark -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
<div>
  <!-- Static sidebar for desktop -->
  <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <nav class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-gray-50 pt-5 pb-4">
      <div class="flex flex-shrink-0 items-center px-4">
        <div class="text-cyan-500 font-bold text-xl">RecRouter</div>
      </div>
      <div class="mt-5 flex-grow">
        <div class="space-y-1">
          <!-- Current: "bg-cyan-50 border-cyan-600 text-cyan-600", Default: "border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
          <a href="{{ url('welcome') }}" class="border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50 group border-l-4 py-2 px-3 flex items-center text-sm font-medium">
            <!--
              Heroicon name: outline/home

              Current: "text-cyan-500", Default: "text-gray-400 group-hover:text-gray-500"
            -->
            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            Home
          </a>

          <a href="{{ url('applications') }}" class="border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50 group border-l-4 py-2 px-3 flex items-center text-sm font-medium">
            <!-- Heroicon name: outline/document-magnifying-glass -->
            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            Applications
          </a>
          <a href="#" class="bg-cyan-50 border-cyan-600 text-cyan-600 group border-l-4 py-2 px-3 flex items-center text-sm font-medium">
            <!-- Heroicon name: outline/cog -->
            <svg class="text-cyan-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
            </svg>
            Settings
          </a>
        </div>
      </div>
      <div class="block w-full flex-shrink-0">
        <a href="{{ url('login') }}" class="group flex items-center border-l-4 border-transparent py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
          <!-- Heroicon name: outline/arrow-left-on-rectangle -->
          <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
          </svg>
          Logout
        </a>
      </div>
    </nav>
  </div>
 
  <!-- modal start -->
 
<div class="nameModal hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
 
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 overflow-y-auto">
    
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
      <div class="nameClose absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
          <button type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">
            <span class="sr-only">Close</span>
            <!-- Heroicon name: outline/x-mark -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      <div>
          <form action="{{url('updatename')}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Enter Name:</label>
            <div class="mt-1">
              <input type="text" name="name" id="name" class="block w-80 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" placeholder="">
            </div>
          </div>
        </div>
        <div class="mt-5 sm:mt-6">
          <button type="submit" name="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-cyan-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 sm:text-sm">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->
<!-- modal start -->
 
<div class="emailModal hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
 
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 overflow-y-auto">
    
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
      <div class="emailClose absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
          <button type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">
            <span class="sr-only">Close</span>
            <!-- Heroicon name: outline/x-mark -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      <div>
          <form action="{{url('updateemail')}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Enter Email:</label>
            <div class="mt-1">
              <input type="text" name="email" id="email" class="block w-80 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" placeholder="">
            </div>
          </div>
        </div>
        <div class="mt-5 sm:mt-6">
          <button type="submit" name="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-cyan-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 sm:text-sm">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->

  <!-- Content area -->
  <div class="md:pl-64">
    <div class="mx-auto flex max-w-4xl flex-col md:px-8 xl:px-0">
      <main class="flex-1">
        <div class="relative mx-auto max-w-4xl md:px-8 xl:px-0">
          <div class="pt-10 pb-16">
            <div class="px-4 sm:px-6 md:px-0">
              <h1 class="text-3xl font-bold tracking-tight text-gray-900">Settings</h1>
            </div>
            <div class="px-4 sm:px-6 md:px-0">
              <div class="py-6">
                
                <!-- Description list with inline editing -->
                <div class="mt-6 divide-y divide-gray-200">
                  <div class="space-y-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                    <p class="max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                  </div>
                  <div class="mt-6">
                    <dl class="divide-y divide-gray-200">
                      <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                          <span class="flex-grow">{{Auth::user()->name}}</span>
                          <span class="ml-4 flex-shrink-0">
                            <button type="button" class="updateName rounded-md bg-white font-medium text-cyan-600 hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Update</button>
                          </span>
                        </dd>
                      </div>
                      <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:pt-5">
                        <dt class="text-sm font-medium text-gray-500">Photo</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                          <span class="flex-grow">
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                          </span>
                          <span class="ml-4 flex flex-shrink-0 items-start space-x-4">
                            <button type="button" class="rounded-md bg-white font-medium text-cyan-600 hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Update</button>
                            <span class="text-gray-300" aria-hidden="true">|</span>
                            <button type="button" class="rounded-md bg-white font-medium text-cyan-600 hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Remove</button>
                          </span>
                        </dd>
                      </div>
                      <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:pt-5">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                          <span class="flex-grow">{{Auth::user()->email}}</span>
                          <span class="ml-4 flex-shrink-0">
                            <button type="button" class="updateEmail rounded-md bg-white font-medium text-cyan-600 hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Update</button>
                          </span>
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>
<script type="text/javascript">
        $(document).ready(function () {
            $('.updateName').on('click', function(e){
                $('.nameModal').removeClass('hidden');
            });
            $('.nameClose').on('click', function(e){
                $('.nameModal').addClass('hidden');
            });
            $('.updateEmail').on('click', function(e){
                $('.emailModal').removeClass('hidden');
            });
            $('.emailClose').on('click', function(e){
                $('.emailModal').addClass('hidden');
            });
            $('.alertClose').on('click', function(e){
                $('.sessionAlert').addClass('hidden');
            });
        });
    </script>
</body>
</html>