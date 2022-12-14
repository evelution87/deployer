<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="my-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     x-data="WorldClock({zones:['Australia/Sydney','US/Central','Europe/London']})">

                    <h2 class="text-lg font-medium">World Clock</h2>
                    <div class="grid md:grid-cols-3 gap-x-6 gap-y-3 text-lg" x-cloak>
                        <template x-for="zone in zones">
                            <div class="grid gap-2 text-center">
                                <span x-text="zone" class="font-bold"></span>
                                <span x-text="dateTime.toLocaleTimeString('en-AU', {timeZone: zone})"></span>
                            </div>
                        </template>
                    </div>
                    <div x-show="loading">
                        Loading...
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="my-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="text-lg font-medium">Ideas</h2>
                    <ul>
                        <li>Trello integration</li>
                        <li>Budgie</li>
                        <li>JSON parser</li>
                        <li>PHP Serialize parser</li>
                        <li>Unix Timestamp tool</li>
                        <li>Laravel quickstart tool</li>
                        <li>Symfony quickstart tool</li>
                        <li>Demo for Alpine Tables</li>
                        <li>FFXIV toolkit</li>
                        <li>Tailwind toolkit</li>
                    </ul>

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
                    loading: true,
                    init() {
                        this.loading = false;
                        this.interval = setInterval(() => {
                            this.dateTime = new Date();
                        }, 1000);
                    }
                };
            });
        });
    </script>

</x-app-layout>
