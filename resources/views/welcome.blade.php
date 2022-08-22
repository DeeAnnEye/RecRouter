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
<div class="page-head bg-cyan-600 h-24 shadow-lg rounded-sm">
   <div class="absolute inset-y-6 left-4 text-white text-4xl font-sans font-medium">RecRouter</div>
</div>
<div>
<dl class="mt-5 mx-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
@foreach($jobData['data'] as $job)
<div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
      <dt>
        <p class="ml-4 text-sm font-medium text-gray-500 truncate">{{ $job->company }}</p>
      </dt>
      <dd class="ml-4 pb-4 flex items-row sm:pb-4">
      <p class="text-2xl font-semibold text-gray-900">  {{ $job->designation }}</p>
      </dd>
      <dd class="ml-4 pb-6 flex items-row sm:pb-7">
        <p class="text-xl font-medium text-gray-700">Pay Range:  {{ $job->salary }}</p>
        <div class="absolute bottom-0 inset-x-0 bg-gray-100 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="/apply" class="ml-4 font-medium text-cyan-600 hover:text-cyan-500"> Apply Now</a>
          </div>
        </div>
      </dd>
    </div>
@endforeach
</dl>
</div>
   
</body>
</html>
