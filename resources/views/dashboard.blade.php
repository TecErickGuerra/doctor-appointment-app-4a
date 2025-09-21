<x-admin-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h1 class="text-2xl font-semibold mb-4">Panel Administrativo</h1>
            <p class="text-lg mb-6">Hola desde admin</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-50 dark:bg-blue-900 p-6 rounded-lg border border-blue-200 dark:border-blue-700">
                    <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2">Citas Hoy</h3>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-300">12</p>
                    <p class="text-sm text-blue-700 dark:text-blue-400 mt-1">Citas programadas</p>
                </div>
                
                <div class="bg-green-50 dark:bg-green-900 p-6 rounded-lg border border-green-200 dark:border-green-700">
                    <h3 class="text-lg font-semibold text-green-900 dark:text-green-100 mb-2">Doctores Activos</h3>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-300">8</p>
                    <p class="text-sm text-green-700 dark:text-green-400 mt-1">En servicio hoy</p>
                </div>
                
                <div class="bg-purple-50 dark:bg-purple-900 p-6 rounded-lg border border-purple-200 dark:border-purple-700">
                    <h3 class="text-lg font-semibold text-purple-900 dark:text-purple-100 mb-2">Pacientes</h3>
                    <p class="text-3xl font-bold text-purple-600 dark:text-purple-300">145</p>
                    <p class="text-sm text-purple-700 dark:text-purple-400 mt-1">Total registrados</p>
                </div>
            </div>
            
            <div class="mt-8 bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                <h3 class="text-lg font-semibold mb-4">Información del Sistema</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Bienvenido al panel administrativo de la aplicación de citas médicas. 
                    Aquí puedes gestionar doctores, pacientes y citas de manera eficiente.
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>