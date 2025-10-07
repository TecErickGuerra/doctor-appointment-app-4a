<!-- Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform 
-translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 
dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">

  <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
    <ul class="space-y-2 font-medium">

      <!-- Dashboard principal -->
      <li>
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white 
           hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 
          group-hover:text-gray-900 dark:group-hover:text-white" 
          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 
            8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 
            1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565
            A8.51 8.51 0 0 0 12.5 0Z"/>
          </svg>
          <span class="ml-3">Dashboard</span>
        </a>
      </li>

      <!-- E-commerce principal -->
      <li>
        <button type="button" 
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 
                rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" 
                aria-controls="ecommerce-dropdown" data-collapse-toggle="ecommerce-dropdown">
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 
          group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" 
          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
            <path d="M1 3h16a1 1 0 0 1 .9 1.44l-7 13a1 1 0 0 1-1.8 0l-7-13A1 1 0 0 1 1 3Z"/>
          </svg>
          <span class="flex-1 ml-3 text-left whitespace-nowrap">E-commerce</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
               fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" 
                  stroke-linejoin="round" stroke-width="2" 
                  d="m1 1 4 4 4-4"/>
          </svg>
        </button>

        <ul id="ecommerce-dropdown" class="hidden py-2 space-y-2">
          <li><a href="#" class="flex items-center w-full p-2 pl-11 text-gray-900 rounded-lg 
                 transition duration-75 group hover:bg-gray-100 dark:text-white 
                 dark:hover:bg-gray-700">Products</a></li>
          <li><a href="#" class="flex items-center w-full p-2 pl-11 text-gray-900 rounded-lg 
                 transition duration-75 group hover:bg-gray-100 dark:text-white 
                 dark:hover:bg-gray-700">Billing</a></li>
          <li><a href="#" class="flex items-center w-full p-2 pl-11 text-gray-900 rounded-lg 
                 transition duration-75 group hover:bg-gray-100 dark:text-white 
                 dark:hover:bg-gray-700">Invoice</a></li>
        </ul>
      </li>

      <!-- Hospital -->
      <li>
        <button type="button" 
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 
                rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" 
                aria-controls="hospital-dropdown" data-collapse-toggle="hospital-dropdown">
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 
          group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" 
          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
            <path d="M9 0a9 9 0 1 0 9 9A9 9 0 0 0 9 0ZM8 13V9H4V8h4V4h1v4h4v1H9v4Z"/>
          </svg>
          <span class="flex-1 ml-3 text-left whitespace-nowrap">Hospital</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
               fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" 
                  stroke-linejoin="round" stroke-width="2" 
                  d="m1 1 4 4 4-4"/>
          </svg>
        </button>

        <ul id="hospital-dropdown" class="hidden py-2 space-y-2">

          <!-- Hospital Dashboard -->
          <li>
            <a href="#" 
               class="flex items-center w-full p-2 pl-11 text-gray-900 rounded-lg 
               transition duration-75 group hover:bg-gray-100 dark:text-white 
               dark:hover:bg-gray-700">Dashboard</a>
          </li>

          <!-- Hospital E-commerce -->
          <li>
            <button type="button" 
                    class="flex items-center w-full p-2 pl-11 text-gray-900 transition duration-75 
                    rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" 
                    aria-controls="hospital-ecommerce-dropdown" 
                    data-collapse-toggle="hospital-ecommerce-dropdown">

              <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 
              group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" 
              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                <path d="M1 3h16a1 1 0 0 1 .9 1.44l-7 13a1 1 0 0 1-1.8 0l-7-13A1 1 0 0 1 1 3Z"/>
              </svg>

              <span class="flex-1 text-left whitespace-nowrap">E-commerce</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                   fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" 
                      stroke-linejoin="round" stroke-width="2" 
                      d="m1 1 4 4 4-4"/>
              </svg>
            </button>

            <ul id="hospital-ecommerce-dropdown" class="hidden py-2 space-y-2">
              <li><a href="#" class="flex items-center w-full p-2 pl-14 text-gray-900 rounded-lg 
                     transition duration-75 group hover:bg-gray-100 dark:text-white 
                     dark:hover:bg-gray-700">Products</a></li>
              <li><a href="#" class="flex items-center w-full p-2 pl-14 text-gray-900 rounded-lg 
                     transition duration-75 group hover:bg-gray-100 dark:text-white 
                     dark:hover:bg-gray-700">Billing</a></li>
              <li><a href="#" class="flex items-center w-full p-2 pl-14 text-gray-900 rounded-lg 
                     transition duration-75 group hover:bg-gray-100 dark:text-white 
                     dark:hover:bg-gray-700">Invoice</a></li>
            </ul>
          </li>

        </ul>
      </li>
    </ul>
  </div>
</aside>
