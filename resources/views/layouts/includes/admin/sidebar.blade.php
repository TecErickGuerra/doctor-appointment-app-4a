@php
  //Arreglo de íconos
  $links = [
    [
      'name' => 'Dashboard',
      'icon' => 'fa-solid fa-gauge',
      'href' => route('admin.dashboard'),
      'active' => request()->routeIs('admin.dashboard'),
    ],
    [
      'header' => 'Gestión',
    ],
    [
      'name' => 'Roles y permisos',
      'icon' => 'fa-solid fa-shield-halved',
      'href' => route('admin.roles.index'),
      'active' => request()->routeIs('admin.roles.index'),
    ],
    [
      'name' => 'Usuarios',
      'icon' => 'fa-solid fa-users',
      'href' => route('admin.users.index'),
      'active' => request()->routeIs('admin.users.index'),
    ],
    [
      'name' => 'Pacientes',
      'icon' => 'fa-solid fa-user-injured',
      'href' => route('admin.patients.index'),
      'active' => request()->routeIs('admin.patients.index'),
    ],
  ];
@endphp

<!-- Sidebar -->
<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform 
  -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
  aria-label="Sidebar">
  <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
    <ul class="space-y-2 font-medium">
      <!-- Dashboard principal -->
      <li>
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group 
           {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }}">
          <i class="fa-solid fa-chart-pie w-5 h-5 text-gray-500"></i>
          <span class="ml-3">Dashboard</span>
        </a>
      </li>
      
      <!-- Sección GESTIÓN -->
      <li class="mt-4">
        <span class="ml-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">
          GESTIÓN
        </span>
      </li>
      
      <!-- Solo Roles y permisos -->
      <li>
        <a href="{{ route('admin.roles.index') }}" 
           class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group 
           {{ request()->routeIs('admin.roles.*') ? 'bg-gray-100' : '' }}">
          <i class="fa-solid fa-shield-halved w-5 h-5 text-gray-500"></i>
          <span class="ml-3">Roles y permisos</span>
        </a>
      </li>

      <!-- Solo Usuarios (NUEVO) -->
      <li>
        <a href="{{ route('admin.users.index') }}"
          class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group 
          {{ request()->routeIs('admin.users.*') ? 'bg-gray-100' : '' }}">
          <i class="fa-solid fa-users w-5 h-5 text-gray-500"></i>
          <span class="ml-3">Usuarios</span>
        </a>
      </li>

      <!-- Solo Pacientes (NUEVO) -->
      <li>
        <a href="{{ route('admin.patients.index') }}" 
           class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group 
           {{ request()->routeIs('admin.patients.*') ? 'bg-gray-100' : '' }}">
          <i class="fa-solid fa-user-injured w-5 h-5 text-gray-500"></i>
          <span class="ml-3">Pacientes</span>
        </a>
      </li>

      <!-- Solo Doctores (NUEVO) -->
      <li>
        <a href="{{ route('admin.doctors.index') }}" 
           class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group 
           {{ request()->routeIs('admin.doctors.*') ? 'bg-gray-100' : '' }}">
          <i class="fa-solid fa-user-doctor w-5 h-5 text-gray-500"></i>
          <span class="ml-3">Doctores</span>
        </a>
      </li>

    </ul>
  </div>
</aside>