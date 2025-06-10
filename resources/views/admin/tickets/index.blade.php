<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <table id="tickets-table" class="display w-full">
                    <thead>
                        <tr>
                            <th>ID</th><th>Name</th><th>Email</th><th>Type</th><th>Status</th><th>Created</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->ticket_type }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                <td><a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#tickets-table').DataTable();
        });
    </script>
</x-app-layout>
