@props(['active' => 'default'])
<div x-data="{tab: '{{ $active }}'}" class="flex gap-6">
    <div class="w-1/4 border-r border-gray-200 pr-4">
        <ul class="space-y-2 text-sm font-medium text-gray-600">
            {{ $header }}
        </ul>
    </div>
    <div class="flex-1">
        {{ $slot }}
    </div>
</div>