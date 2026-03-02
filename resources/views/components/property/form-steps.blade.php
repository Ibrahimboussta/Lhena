<div class="w-full mb-8">
    <div class="flex justify-between items-center">
        @php
            $steps = [
                'Type d\'annonce',
                'Détails du bien',
                'Localisation',
                'Photos',
                'Récapitulatif'
            ];
        @endphp

        @foreach($steps as $index => $step)
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center mb-2 step-indicator {{ $index === 0 ? 'bg-green-600 text-white' : 'bg-gray-200' }}"
                     data-step="{{ $index + 1 }}">
                    {{ $index + 1 }}
                </div>
                <span class="text-sm text-center {{ $index === 0 ? 'text-green-600 font-medium' : 'text-gray-500' }}">
                    {{ $step }}
                </span>
            </div>
            @if(!$loop->last)
                <div class="flex-1 h-1 mx-2 bg-gray-200 rounded-full">
                    <div class="h-1 bg-green-600 rounded-full progress-bar" style="width: 0%"></div>
                </div>
            @endif
        @endforeach
    </div>
</div>
