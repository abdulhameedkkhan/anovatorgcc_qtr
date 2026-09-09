@php
    $model = $model ?? 'a5';
    $uid = 'd'.substr(md5($model.uniqid('', true)), 0, 8);
    $tall = in_array($model, ['a5', 'm3'], true);
    $dark = in_array($model, ['a5', 'm3'], true);
@endphp
<svg class="device device-{{ $model }}" viewBox="0 0 320 500" role="img" aria-label="Anovator {{ strtoupper($model) }}">
    <defs>
        <radialGradient id="floor-{{ $uid }}" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#000" stop-opacity=".16"/>
            <stop offset="100%" stop-color="#000" stop-opacity="0"/>
        </radialGradient>
        <linearGradient id="metal-{{ $uid }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="{{ $dark ? '#4a4e55' : '#fbfbfc' }}"/>
            <stop offset="45%" stop-color="{{ $dark ? '#1b1d21' : '#d5dbe3' }}"/>
            <stop offset="100%" stop-color="{{ $dark ? '#2f3238' : '#eef1f4' }}"/>
        </linearGradient>
        <linearGradient id="bezel-{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="{{ $dark ? '#2a2d32' : '#f7f8fa' }}"/>
            <stop offset="100%" stop-color="{{ $dark ? '#111214' : '#cfd5dc' }}"/>
        </linearGradient>
        <linearGradient id="screen-{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#141820"/>
            <stop offset="100%" stop-color="#07090d"/>
        </linearGradient>
        <linearGradient id="glow-{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#7ad7ff" stop-opacity=".35"/>
            <stop offset="100%" stop-color="#7ad7ff" stop-opacity="0"/>
        </linearGradient>
    </defs>

    <ellipse cx="160" cy="478" rx="118" ry="16" fill="url(#floor-{{ $uid }})"/>

    <rect x="68" y="402" width="184" height="58" rx="10" fill="url(#metal-{{ $uid }})" stroke="{{ $dark ? '#0d0e10' : '#b7bec6' }}" stroke-width="1"/>
    <rect x="86" y="392" width="148" height="16" rx="5" fill="{{ $dark ? '#111' : '#dde2e8' }}"/>
    <rect x="102" y="396" width="28" height="6" rx="3" fill="#EF0A6A" opacity=".85"/>
    <rect x="138" y="396" width="80" height="6" rx="3" fill="{{ $dark ? '#3a3d43' : '#c5ccd4' }}"/>

    @if($tall)
        <rect x="138" y="118" width="44" height="278" rx="8" fill="url(#metal-{{ $uid }})" stroke="{{ $dark ? '#0d0e10' : '#b7bec6' }}"/>
        <rect x="78" y="36" width="164" height="248" rx="16" fill="url(#bezel-{{ $uid }})" stroke="{{ $dark ? '#000' : '#b7bec6' }}"/>
        <rect x="90" y="50" width="140" height="220" rx="8" fill="url(#screen-{{ $uid }})"/>
        <rect x="90" y="50" width="140" height="70" fill="url(#glow-{{ $uid }})"/>

        <g fill="none" stroke="#9be7ff" stroke-width="1.2" opacity=".9">
            <circle cx="160" cy="118" r="18"/>
            <path d="M160 136 v38"/>
            <path d="M160 148 l-22 18"/>
            <path d="M160 148 l22 18"/>
            <path d="M160 174 l-14 36"/>
            <path d="M160 174 l14 36"/>
        </g>
        <rect x="90" y="78" width="140" height="2" fill="#7ad7ff" opacity=".45">
            <animate attributeName="y" values="62;250;62" dur="4s" repeatCount="indefinite"/>
            <animate attributeName="opacity" values=".15;.7;.15" dur="4s" repeatCount="indefinite"/>
        </rect>
        <text x="160" y="88" text-anchor="middle" fill="#EF0A6A" font-size="9" font-family="Inter, Arial, sans-serif">anovator</text>
        <text x="160" y="248" text-anchor="middle" fill="#fff" font-size="16" font-family="Inter, Arial, sans-serif">{{ strtoupper($model) }}</text>
        <text x="108" y="232" fill="#9aa3ad" font-size="7" font-family="Inter, Arial, sans-serif">BF 18.2</text>
        <text x="186" y="232" fill="#9aa3ad" font-size="7" font-family="Inter, Arial, sans-serif" text-anchor="end">MM 42.6</text>

        <rect x="42" y="188" width="30" height="92" rx="12" fill="url(#metal-{{ $uid }})" stroke="{{ $dark ? '#000' : '#b7bec6' }}"/>
        <rect x="248" y="188" width="30" height="92" rx="12" fill="url(#metal-{{ $uid }})" stroke="{{ $dark ? '#000' : '#b7bec6' }}"/>
        <path d="M72 280 C72 330 110 388 138 402" fill="none" stroke="{{ $dark ? '#111' : '#9aa3ad' }}" stroke-width="3"/>
        <path d="M248 280 C248 330 210 388 182 402" fill="none" stroke="{{ $dark ? '#111' : '#9aa3ad' }}" stroke-width="3"/>
    @else
        <rect x="146" y="210" width="28" height="186" rx="6" fill="url(#metal-{{ $uid }})" stroke="#b7bec6"/>
        <rect x="96" y="72" width="128" height="176" rx="14" fill="url(#bezel-{{ $uid }})" stroke="#b7bec6"/>
        <rect x="106" y="84" width="108" height="152" rx="7" fill="url(#screen-{{ $uid }})"/>
        <g fill="none" stroke="#9be7ff" stroke-width="1.1" opacity=".9">
            <circle cx="160" cy="140" r="14"/>
            <path d="M160 154 v28M160 164 l-16 14M160 164 l16 14M160 182 l-10 28M160 182 l10 28"/>
        </g>
        <text x="160" y="112" text-anchor="middle" fill="#EF0A6A" font-size="8" font-family="Inter, Arial, sans-serif">anovator</text>
        <text x="160" y="220" text-anchor="middle" fill="#fff" font-size="14" font-family="Inter, Arial, sans-serif">{{ strtoupper($model) }}</text>
        <rect x="62" y="230" width="24" height="70" rx="10" fill="url(#metal-{{ $uid }})" stroke="#b7bec6"/>
        <rect x="234" y="230" width="24" height="70" rx="10" fill="url(#metal-{{ $uid }})" stroke="#b7bec6"/>
    @endif
</svg>
