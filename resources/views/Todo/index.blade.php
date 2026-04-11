<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-2xl font-bold mb-4">Daftar Tugas (Todo)</h1>
                <ul>
                    @foreach ($todos as $todo)
                        <li>{{ $todo->task }} - <strong>{{ $todo->user->name }}</strong></li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>