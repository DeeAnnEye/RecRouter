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
<nav class="bg-gradient-to-r from-cyan-500 to-gray-500">
  <div class="px-2 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
    <div class="ml-2">
          <div class="text-white text-4xl font-sans font-medium">RecRouter</div>
    </div>
    @if(Auth::check())      
        <!-- Profile dropdown -->
        <div class="ml-3">
          <div class="userProfile">
            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-10 w-10 rounded-full" src="{{ asset('storage/upload/' . Auth::user()->image) }}" alt="">
            </button>
          </div>
          <div class="dropdown hidden origin-top-right z-40 absolute right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
          @if(Auth::user()->role == '1')
          <a href="{{ url('/admin') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Admin Panel</a>
          @endif
            <a href="{{ url('/profile', Auth::user()->id) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
            <a href="{{ url('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</nav>
@if(session()->has('message'))
<div class="sessionAlert rounded-md bg-green-50 p-4">
  <div class="flex">
    <div class="flex-shrink-0">
      <!-- Heroicon name: mini/check-circle -->
      <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
      </svg>
    </div>
    <div class="ml-3">
      <p class="text-sm font-medium text-green-800">{{ session()->get('message') }}</p>
    </div>
    <div class="ml-auto pl-3">
      <div class="-mx-1.5 -my-1.5">
        <button type="button" class="alertClose inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
          <span class="sr-only">Dismiss</span>
          <!-- Heroicon name: mini/x-mark -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
  @endif

<div class="flex flex-row">
<div class="w-full ml-8 mt-4 md:items-start">
    <h2 class="text-2xl font-medium leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ $updateData->company }}</h2>
    <form action="{{ url('/updateJob', $updateData->id) }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type='hidden' value="{{ $updateData->id }}" name='jobId'>
  <div class="mt-6 grid grid-cols-2 gap-2 gap-y-4">
  <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">Description</dt>
                <dd class="mt-1 text-sm text-gray-900"><input type="text" name="description" id="description" value="{{ $updateData->description }}" class="block w-96 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm"></dd>
    </div>
  <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Designation</dt>
                <dd class="mt-1 text-sm text-gray-900"><input type="text" name="designation" id="designation" value="{{ $updateData->designation }}" class="block w-96 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm"></dd>
    </div>
    <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Salary</dt>
                <dd class="mt-1 text-sm text-gray-900"><input type="text" name="salary" id="salary" value="{{ $updateData->salary }}" class="block w-96 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm"></dd>
    </div>
    <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Vacancy</dt>
                <dd class="mt-1 text-sm text-gray-900"><input type="text" name="vacancy" id="vacancy" value="{{ $updateData->vacancy }}" class="block w-96 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm"></dd>
    </div>
    <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Contact</dt>
                <dd class="mt-1 text-sm text-gray-900"><input type="text" name="email" id="email" value="{{ $updateData->email }}" class="block w-96 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm"></dd>
    </div>  
    <div class="sm:col-span-1">
                @if( $updateData->active=='1' )
                <div class="activeCheck relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked/>
                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
               <label id="activeCheck" for="toggle" class="text-xs text-gray-700">Active</label>
               </div>
               @else
               <div class="activeCheck relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
               <label id="activeCheck" for="toggle" class="text-xs text-gray-700">Inactive</label>
               </div>
               @endif
    </div> 
    <div class="mt-4 sm:col-span-1">
    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Update</button>
    <button type="button" onclick="window.location='{{ url("admin") }}'" class="ml-4 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Cancel</button>
  </div>
</div>
</form>
</div>
</div>
  <script type="text/javascript">
        $(document).ready(function () {
          $('.userProfile').on('click', function(e){
                $('.dropdown').toggleClass('hidden');
            });
            $('.alertClose').on('click', function(e){
                $('.sessionAlert').addClass('hidden');
            });
            $('.toggle-checkbox').on('click', function(e){
               if($('#activeCheck').text()== 'Active'){
                $('#activeCheck').text('Inactive')
               }
               else{
                $('#activeCheck').text('Active')
               }
                
            });
        });
    </script>
  </body>
</html>
