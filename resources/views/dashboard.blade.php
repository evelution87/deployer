<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     x-data="WorldClock({zones:['Australia/Sydney','US/Central','Europe/London']})">

                    <h2 class="text-lg font-medium">World Clock</h2>
                    <div class="grid md:grid-cols-3 gap-x-6 gap-y-3 text-lg">
                        <template x-for="zone in zones">
                            <div class="grid gap-2 text-center">
                                <span x-text="zone" class="font-bold"></span>
                                <span x-text="dateTime.toLocaleTimeString('en-AU', {timeZone: zone})"></span>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('WorldClock', (data) => {
                return {
                    dateTime: new Date(),
                    zones: data.zones || [],
                    interval: null,
                    init() {
                        this.interval = setInterval(() => {
                            this.dateTime = new Date();
                        }, 1000);
                    }
                };
            });
        });
    </script>

</x-app-layout>
