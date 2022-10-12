<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
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
            <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
            <a href="{{ url('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</nav>
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
   <!-- modal start -->
 
<div class="addJobModal hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
 
 <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
 <div class="fixed inset-0 z-10 overflow-y-auto">
   
   <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
     <div class="relative w-1/2 transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:p-6">
     <div class="addClose absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
         <button type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">
           <span class="sr-only">Close</span>
           <!-- Heroicon name: outline/x-mark -->
           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
             <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
           </svg>
         </button>
       </div>
     <div>
         <form action="{{url('addJob')}}" method="POST">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="grid grid-cols-2 gap-4">
          <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Company Name:</label>
           <div class="mt-1">
             <input type="text" name="company" id="company" class="block w-80 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" placeholder="">
           </div>
         </div>
         <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Job Designation:</label>
           <div class="mt-1">
             <input type="text" name="desg" id="desg" class="block w-80 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" placeholder="">
           </div>
         </div>
         <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Vacancy:</label>
           <div class="mt-1">
             <input type="text" name="vacancy" id="vacancy" class="block w-80 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" placeholder="">
           </div>
         </div>
         <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Email:</label>
           <div class="mt-1">
             <input type="text" name="email" id="email" class="block w-80 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" placeholder="">
           </div>
         </div>
         <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Salary:</label>
           <div class="mt-1">
             <input type="text" name="salary" id="salary" class="block w-80 h-10 rounded-md border border-gray-400 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" placeholder="">
           </div>
         </div>
         <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Description:</label>
           <div class="mt-1">
           <textarea id="desc" name="desc" rows="3" class="max-w-lg shadow-sm block w-full h-16 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
           </div>
         </div>
         <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Application End Date:</label>
           <div class="mt-1">
           <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <input datepicker="" datepicker-format="yyyy/mm/dd" datepicker-autohide type="text" name="end_date" value="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-86 pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select End date">
               </div>
           </div>
         </div>
          </div>
       </div>
       <div class="mt-5 sm:mt-6">
         <button type="submit" name="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-cyan-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 sm:text-sm">Add Job</button>
       </div>
     </form>
     </div>
   </div>
 </div>
</div>
<!-- modal end -->

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
            <div class="grid"><button type="button" class="addJob mr-3 mt-3 justify-self-end  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Add Job</button></div>
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
                            <a href="{{ url('/getUpdateJob', $job->id) }}"><button type="button" class="updateJob rounded-md font-medium text-cyan-600 hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Update</button></a>
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
            $('.addClose').on('click', function(e){
                $('.addJobModal').addClass('hidden');
            });
            $('.userProfile').on('click', function(e){
                $('.dropdown').toggleClass('hidden');
            });
            $('.addJob').on('click', function(e){
                $('.addJobModal').removeClass('hidden');
            });
            // $('.updateJob').on('click', function(e){
            //       $('.updateModal').removeClass('hidden');
            //   }); 
        });
    </script>
</body>
</html>