<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold text-white 
                bg-gradient-to-r from-[#419cf6] to-[#844ff0] shadow-lg 
                hover:scale-[1.02] hover:shadow-[#419cf6]/30 focus:ring-4 focus:ring-[#844ff0]/30 transition-all duration-300'
]) }}>
    {{ $slot }}
</button>
