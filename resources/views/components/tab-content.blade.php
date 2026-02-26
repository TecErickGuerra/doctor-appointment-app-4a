@props(['tab', 'error' => false])
<div
    x-show="tab === '{{ $tab }}'"
    x-cloak
    role="tabpanel"
    class="bg-white rounded-lg shadow-sm p-6 mt-4 border border-gray-100 transition-opacity duration-300"
>
    {{ $slot }}
</div>