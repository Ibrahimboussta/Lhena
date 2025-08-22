@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'lhena')
                {{-- Hna kansta3mlo asset() bach yjib l'URL se7i7a men .env --}}
                {{-- <h1>Lhena.ma</h1> --}}
                <img src="https://instagram.fcmn1-2.fna.fbcdn.net/v/t51.2885-19/531829488_17844434361551837_356515921063059327_n.jpg?efg=eyJ2ZW5jb2RlX3RhZyI6InByb2ZpbGVfcGljLmRqYW5nby4xMDgwLmMyIn0&_nc_ht=instagram.fcmn1-2.fna.fbcdn.net&_nc_cat=105&_nc_oc=Q6cZ2QH2QuTI2rTK1vFvnozRj8obLK3jNlvqjTmY-REhtb0V7OgrQch9elIllny65CpqY6s&_nc_ohc=ZHO4KHKVzhoQ7kNvwH5aKTz&_nc_gid=oQb181Du6XR801u-R5zSvQ&edm=ALGbJPMBAAAA&ccb=7-5&oh=00_AfWI4xwxNYvfSpMWKjHTNH52mHhqvIQ6ihoAcX4XskjLxA&oe=68A84B78&_nc_sid=7d3ac5" alt="Lhena Logo" style="height: 50px; width: auto;">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
