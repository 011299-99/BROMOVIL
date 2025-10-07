@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'block w-full rounded-xl bg-white/10 border border-white/30 text-white placeholder-white/50 
                focus:border-[#7b56db] focus:ring-[#7b56db] focus:ring-2 focus:outline-none 
                transition-all duration-200 px-4 py-3'
]) !!}>
