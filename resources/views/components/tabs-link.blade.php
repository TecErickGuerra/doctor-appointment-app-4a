@props(['tab', 'error' => false])

@php
    $hasError = $error ? 'true' : 'false';
@endphp

<li class="me-2">
    <a href="#" 
        x-on:click="tab = '{{ $tab }}'"
        x-bind:class="{
            'text-blue-600 border-blue-600 bg-white shadow-sm': tab === '{{ $tab }}',
            'text-gray-500 hover:text-blue-600 hover:border-blue-300': tab !== '{{ $tab }}'
        }"
        class="inline-flex items-center gap-2 px-5 py-3 border-b-2 border-transparent rounded-t-md transition-colors duration-200"
        :aria-current="tab === '{{ $tab }}' ? 'page' : undefined"
    >
        {{ $slot }}
    </a>
</li>