@props(['status'])

@if ($status)
    <div {{ $attributes->merge([
        'class' => 'mb-4 px-4 py-3 rounded-lg bg-green-500/20 border border-green-400 text-green-100 text-sm'
    ]) }}>
        {{ $status }}
    </div>
@endif
