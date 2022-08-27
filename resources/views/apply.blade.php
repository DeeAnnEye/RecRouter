<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <title>RecRouter</title>
</head>
<body>
<nav class="bg-gradient-to-r from-cyan-500 to-gray-500">
  <div class="px-2 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
    <div class="ml-2">
          <div class="text-white text-4xl font-sans font-medium">RecRouter</div>
    </div>
        <!-- Profile dropdown -->
        <div class="ml-3">
          <div>
            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-10 w-10 rounded-full" src="https://www.famousbirthdays.com/faces/hemsworth-chris-image.jpg" alt="">
            </button>
          </div>
          <!-- <div class="origin-top-right z-40 absolute right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</nav>
<form class="mt-6 mx-4 space-y-8 divide-y divide-gray-200">
  <div class="mx-4 space-y-8 divide-y divide-gray-200 sm:space-y-5">
    <div>

      <div class="mb-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Personal Information</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Use a permanent mail address where you can receive email.</p>
      </div>

      <div class="space-y-6 sm:space-y-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> First name </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="max-w-lg block w-full h-8 shadow-sm focus:ring-indigo-500 focus:border-cyan-500 sm:max-w-xs sm:text-sm border border-gray-300 rounded-md">
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Last name </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="max-w-lg block w-full h-8 shadow-sm focus:ring-indigo-500 focus:border-cyan-500 sm:max-w-xs sm:text-sm border border-gray-300 rounded-md">
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Email address </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input id="email" name="email" type="email" autocomplete="email" class="block max-w-lg w-full h-8 shadow-sm focus:ring-indigo-500 focus:border-cyan-500 sm:text-sm border border-gray-300 rounded-md">
          </div>
        </div>

        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> About </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <textarea id="about" name="about" rows="3" class="max-w-lg shadow-sm block w-full h-16 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
            <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
          </div>
        </div>

    </div>
</div>

  <div class="pt-5">
    <div class="mr-3 flex justify-end">
      <button type="button" onclick="window.location='{{ url("welcome") }}'" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Cancel</button>
      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Send Application</button>
    </div>
  </div>
</form>
</div>
</body>
</html>
