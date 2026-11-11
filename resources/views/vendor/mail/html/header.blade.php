@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (strtolower(trim($slot)) === 'sorvarent')
                <img src="{{ asset('images/newlogo.png') }}" alt="SorvaRent Logo" style="height: 50px; width: auto;">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
