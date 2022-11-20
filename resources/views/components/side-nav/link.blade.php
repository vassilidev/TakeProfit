<a class="nav-link" href="{{ $url }}" target="{{ $target }}">
    @isset($icon)
        <div class="nav-link-icon">
            <i class="{{ $icon }}"></i>
        </div>
    @endisset
    {{ $text }}
</a>