<?php

use App\Models\Episode;
use Illuminate\Support\Stringable;
use function Livewire\Volt\computed;
use function Livewire\Volt\state;

$episodes = computed(fn () => Episode::get());


$formatDuration = function ($seconds) {
    return str(date('G\h i\m s\s', $seconds))
        ->trim('0h ')
        ->explode(' ')
        ->mapInto(Stringable::class)
        ->each->ltrim('0')
        ->join(' ');
};

?>

<x-layout>
    @volt
    <div class="rounded-xl border border-gray-200 bg-white shadow">
        <ul class="divide-y divide-gray-100">
            @foreach ($this->episodes as $episode)
                <li
                    wire:key="{{ $episode->number }}"
                    class="flex flex-col items-start gap-x-6 gap-y-3 px-6 py-4 sm:flex-row sm:items-center sm:justify-between"
                >
                    <div>


                        <a href="/episodes/{{ $episode->number}}"
                           class="transition hover:text-[#FF2D20]"
                           wire:navigate
                        >
                            <h2>
                                No. {{ $episode->number }} - {{ $episode->title }}
                            </h2>
                        </a>

                        <div
                            class="mt-1 flex flex-wrap items-center gap-x-3 gap-y-1 text-sm text-gray-500"
                        >
                            <p>
                                Released:
                                {{ $episode->released_at->format('M j, Y') }}
                            </p>
                            &middot;
                            <p>
                                Duration:
                                {{ $this->formatDuration($episode->duration_in_seconds) }}
                            </p>
                        </div>
                    </div>
                    <button
                        type="button"
                        x-data
                        @click="$dispatch('play-episode', @js($episode))"
                        class="flex shrink-0 items-center gap-1 text-sm font-medium text-[#FF2D20] transition hover:opacity-60"
                    >
                          <svg height="32px" width="32px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x33_78-Window_Media_Player"><g><path d="M256.002,26.001c-126.475,0-229.38,103.183-229.38,229.999    c0,126.813,102.905,229.999,229.38,229.999c126.47,0,229.375-103.187,229.375-229.999    C485.377,129.184,382.473,26.001,256.002,26.001z" style="fill:#FFFFFF;"/><path d="M256.002,428.495c-94.877,0-172.038-77.364-172.038-172.495S161.125,83.501,256.002,83.501    c94.873,0,172.027,77.368,172.027,172.499S350.875,428.495,256.002,428.495z" style="fill:#FF8416;"/><path d="M335.277,243.811l-114.688-71.876c-4.416-2.788-10.034-2.903-14.536-0.404    c-4.561,2.563-7.396,7.364-7.396,12.597v143.747c0,5.232,2.835,10.064,7.396,12.592c2.147,1.18,4.553,1.784,6.934,1.784    c2.64,0,5.277-0.725,7.602-2.188l114.688-71.872c4.184-2.618,6.738-7.244,6.738-12.191    C342.016,251.055,339.461,246.424,335.277,243.811z" style="fill:#FFFFFF;"/></g></g><g id="Layer_1"/></svg>
                        <span>Play</span>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
    @endvolt
</x-layout>
