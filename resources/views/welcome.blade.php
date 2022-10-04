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
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js" type="application/javascript"></script>
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
            <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
            <a href="{{ url('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</nav>

<dl class="mt-6 mx-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
@foreach($jobData['data'] as $job)
@if($job->removed =='0')
<div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow-lg rounded-lg overflow-hidden">
      <dt>
        <p class="ml-2 text-sm font-medium text-gray-500 truncate">{{ $job->company }}</p>
      </dt>
      <dd class="mt-4 ml-2 pb-2 flex items-row sm:pb-4">
      <p class="text-2xl font-semibold text-gray-900">  {{ $job->designation }}</p>
      </dd>
      @if($job->active =='1')
      <dd class="ml-2 pb-2 flex items-row sm:pb-4">
      <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-0.5 text-sm font-medium text-green-600">Actively recruiting</span>
      </dd>
      @else
      <dd class="ml-2 pb-2 flex items-row sm:pb-4">
      <span class="inline-flex items-center rounded-full bg-gray-200 px-3 py-0.5 text-sm font-medium text-gray-600">Not recruiting currently.</span>
      </dd>
      @endif
      <dd class="mt-2 ml-2 pb-2 flex items-row sm:pb-4">
      <p class="text-base font-medium text-gray-900"> Time Left: &nbsp;</p>
      <div class="text-base font-medium text-gray-900" data-countdown="{{ $job->end_date }}"></div>
      </dd>
      <dd class="ml-2 pb-6 flex items-row sm:pb-7">
        <!-- <p class="text-xl font-medium text-gray-700">Pay Range:  {{ $job->salary }}</p> -->
        <div class="absolute bottom-0 inset-x-0 bg-cyan-500 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="{{ url('/apply', $job->id) }}" class="ml-4 font-medium text-gray-800 hover:text-gray-500"> See Details</a>
          </div>
        </div>
      </dd>
    </div>
@endif
@endforeach
</dl>
</div>
<script type="text/javascript">
        $(document).ready(function () {
            $('.userProfile').on('click', function(e){
                $('.dropdown').toggleClass('hidden');
            });
            $('[data-countdown]').each(function() {
            var $this = $(this);
            var finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
              $this.html(event.strftime('%D days %H:%M:%S'));
            });
            });
        });
    </script>
</body>
</html>
