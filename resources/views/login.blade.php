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
<div class="page-head bg-cyan-600 h-24 shadow-lg rounded-sm">
   <div class="absolute inset-y-6 left-4 text-white text-4xl font-sans font-medium">RecRouter?</div>
</div>
<div class="ml-4 mt-10 flex justify-center">
    <div>
<div class="mt-6">
  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
  <div class="mt-2">
    <input type="email" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 block w-80 h-10 sm:text-sm border-blue-300 shadow-md rounded-md" placeholder="  you@example.com">
  </div>
</div>
<div class="mt-6">
  <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
  <div class="mt-2">
    <input type="password" name="password" id="password" class="focus:ring-indigo-500 focus:border-indigo-500 block w-80 h-10 sm:text-sm border-blue-300 shadow-md rounded-md" placeholder="">
  </div>
</div>
<div class="mt-6 flex justify-between">
<button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
<a href="#" class="text-cyan-500 self-center no-underline hover:underline ...">New?Register</a>
</div>
</div>
</div>
</body>
</html>