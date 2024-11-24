@props(['href', 'label' => 'Cancel'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'button-cancel']) }}>{{ strlen($slot) ? $slot : $label }}</a>
