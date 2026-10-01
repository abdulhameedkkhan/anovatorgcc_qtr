@php
    $model = $model ?? 'a5';
    $labels = [
        'a5' => 'Anovator A5',
        'm3' => 'Anovator M3',
        'm1' => 'Anovator M1',
        'm0' => 'Anovator M0',
        'p5' => 'Anovator P5',
        'm2-pro' => 'Anovator M2 Pro',
    ];
    $label = $labels[$model] ?? ('Anovator '.strtoupper($model));
    $png = public_path('images/products/'.$model.'/1.png');
    $jpg = public_path('images/products/'.$model.'/1.jpg');
    $file = file_exists($jpg) ? '1.jpg' : '1.png';
@endphp
<img
    class="device device-photo device-{{ $model }}"
    src="{{ asset('images/products/'.$model.'/'.$file) }}?v=10"
    alt="{{ $label }}"
    width="320"
    height="500"
    loading="lazy"
    decoding="async"
>
