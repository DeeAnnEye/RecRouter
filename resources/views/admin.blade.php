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
                          <button type="button" class=" alertClose inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">
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
 
  <!-- Content area -->
 
    <div class="flex flex-col md:px-8 xl:px-0">
      <main class="flex-1">
        <div class="relative mx-2 md:px-8 xl:px-0">
          <div class="pt-4 pb-16">
            <div class="flex flex-row justify-between items-center ">
            <div class="px-4 sm:px-6 md:px-0">
              <h1 class="ml-4 text-3xl font-bold tracking-tight text-cyan-600">Job Applications</h1>
            </div>
            <div class="px-4 sm:px-6 md:px-0">
              <a href="{{ url('/welcome') }}"><h1 class="mr-4 text-base font-bold tracking-tight text-cyan-500 hover:text-cyan-700">Back to Dashboard</h1></a>
            </div>
            </div>
  
                <div class="mt-4 flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full">
                        <thead class="bg-gray-100 border-b">
                          <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              Company
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              Designation
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              Vacancy
                            </th>
                            <!-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              Description
                            </th> -->
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Status
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Email
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            End Date
                            </th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($jobData['data'] as $job)
                        @if($job->removed =='0')
                          <tr class="bg-white border-b hover:bg-gray-200">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $job->company }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $job->designation }}
                            </td>
                            
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $job->vacancy }}
                            </td>
                            <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $job->description }}
                            </td> -->
                            @if($job->active == '1')
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                            </td>
                            @else
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold leading-5 text-gray-800">Inactive</span>
                            </td>
                            @endif
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $job->email }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{date('d-m-Y', strtotime($job->end_date))}}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <span class="ml-4 flex flex-shrink-0 items-start space-x-4">
                            <a href="{{ url('/updateJob', $job->id) }}"><button type="button" class="updateImg rounded-md font-medium text-cyan-600 hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Update</button></a>
                            <span class="text-gray-300" aria-hidden="true">|</span>
                            <a href="{{ url('/deleteJob', $job->id) }}"><button type="button" class="rounded-md font-medium text-cyan-600 hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Remove</button></a>
                          </span>
                          </td>
                          </tr>
                          @endif
                          @endforeach 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </main>
    </div>
  </div>

<script type="text/javascript">
        $(document).ready(function () {
            $('.closeButton').on('click', function(e){
                  $('.sideNav').addClass('hidden');
              });
            $('.alertClose').on('click', function(e){
                $('.sessionAlert').addClass('hidden');
            });  
        });
    </script>
</body>
</html>