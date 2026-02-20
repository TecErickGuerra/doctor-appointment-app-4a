@props([
    'name' => '',
    'label' => null,
    'value' => null,
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <textarea id="{{ $name }}" name="{{ $name }}" rows="4"
        {{ $attributes->merge(['class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm']) }}>
        {{ old($name, $value ?? $slot) }}
    </textarea>

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>