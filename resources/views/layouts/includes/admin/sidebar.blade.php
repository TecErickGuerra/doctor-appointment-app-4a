<!-- Sidebar -->
<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform 
  -translate-x-full bg-gray-900 border-r border-gray-800 sm:translate-x-0 
  dark:bg-gray-900 dark:border-gray-700"
  aria-label="Sidebar">

  <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-900">
    <ul class="space-y-2 font-medium text-white">

      <!-- Dashboard principal -->
      <li>
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group bg-gray-700">
          <svg class="w-5 h-5 text-gray-300 transition duration-75 group-hover:text-white" 
          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 
            8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 
            1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565
            A8.51 8.51 0 0 0 12.5 0Z"/>
          </svg>
          <span class="ml-3 font-semibold">Dashboard</span>
        </a>
      </li>

      <!-- Sección Hospital -->
      <li class="mt-4">
        <span class="ml-3 text-sm font-semibold text-gray-400 uppercase tracking-wide">
          HOSPITAL
        </span>
        <button type="button" 
                class="flex items-center w-full p-2 mt-2 text-white rounded-lg hover:bg-gray-700 group" 
                aria-controls="hospital-dropdown" data-collapse-toggle="hospital-dropdown">
          <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 
          group-hover:text-white" 
          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
            <path d="M9 0a9 9 0 1 0 9 9A9 9 0 0 0 9 0ZM8 13V9H4V8h4V4h1v4h4v1H9v4Z"/>
          </svg>
          <span class="flex-1 ml-3 text-left whitespace-nowrap">Dashboard</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
               fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" 
                  stroke-linejoin="round" stroke-width="2" 
                  d="m1 1 4 4 4-4"/>
          </svg>
        </button>

        <ul id="hospital-dropdown" class="hidden py-2 space-y-2">
          <li>
            <a href="#" class="flex items-center w-full p-2 pl-11 text-white rounded-lg 
               transition duration-75 hover:bg-gray-700 group">Products</a>
          </li>
          <li>
            <a href="#" class="flex items-center w-full p-2 pl-11 text-white rounded-lg 
               transition duration-75 hover:bg-gray-700 group">Billing</a>
          </li>
          <li>
            <a href="#" class="flex items-center w-full p-2 pl-11 text-white rounded-lg 
               transition duration-75 hover:bg-gray-700 group">Invoice</a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</aside>
