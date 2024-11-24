@props(['label' => 'Submit'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button-submit']) }}>{{ strlen($slot) ? $slot : $label }}</button>
