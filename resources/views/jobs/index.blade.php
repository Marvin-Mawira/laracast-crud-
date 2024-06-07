<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h5 class="text-center text-bold rounded shadow">Jobs</h5>

    {{-- <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }} " class="text-blue-500 hover:underline">
                    <strong>
                        {{ $job['title'] }};
                    </strong>
                    Pays {{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul> --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($jobs as $job)
            <div class="border p-4 rounded shadow">
                <a href="/jobs/{{ $job['id'] }} " class="text-blue-500 hover:underline">

                    
                    <strong class="block text-lg mb-2">
                        {{ $job['title'] }};
                    </strong>
                    <p> Pays {{ $job['salary'] }} per year. </p>
                </a>

            </div>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>

    </div>
</x-layout>
