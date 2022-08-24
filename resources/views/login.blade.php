<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <title>Login</title>
</head>
<body>
<div class="h-full flex">
  <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="my-28 mx-auto w-full max-w-sm lg:w-96">
      <div>
        <div class="text-cyan-600 text-4xl font-sans font-medium">RecRouter</div>
        <h2 class="mt-6 text-3xl tracking-tight font-bold text-gray-900">Sign in to your account</h2>
      </div>
  
      <div class="mt-8">
        <div>
          <div>
                      
          </div>
        </div>

        <div class="mt-8">
          <form action="{{ route('login') }}" method="POST" class="space-y-6">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="space-y-1">
              <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
              <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
              </div>

              <div class="text-sm">
                <a href="#" class="font-medium text-cyan-600 hover:text-cyan-500"> Forgot your password? </a>
              </div>
            </div>

            <div>
              <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="hidden lg:block relative w-0 flex-1">
    <img class="absolute inset-0 h-full w-full object-cover" src="https://www.ismartrecruit.com/upload/blog/main_image/Top_7_Mistakes_to_Avoid_During_Online_hiring.jpg" alt="">
  </div>
</div>
</body>
</html>