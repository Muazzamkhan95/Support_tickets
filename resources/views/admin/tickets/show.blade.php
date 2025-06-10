
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket #{{ $ticket->id }}
        </h2>
    </x-slot>
    <!-- @if($ticket->note)
        <div class="alert alert-light border mt-4">
            <strong>Admin Note:</strong>
            <div>{!! nl2br(e($ticket->note)) !!}</div>
        </div>
    @endif -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <p><strong>Name:</strong> {{ $ticket->name }}</p>
            <p><strong>Email:</strong> {{ $ticket->email }}</p>
            <p><strong>Type:</strong> {{ $ticket->ticket_type }}</p>
            <p><strong>Message:</strong></p>
            <div class="border p-3 mb-4">{{ $ticket->message }}</div>

            @if($ticket->status === 'Open')
            <form method="POST" action="{{ route('admin.tickets.note', $ticket) }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Add Note (admin only)</label>
                    <textarea name="note" id="editor" class="form-control" rows="4">{{ old('note') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Mark as Noted</button>
            </form>
            @else
                <div class="alert alert-info">Status: {{ $ticket->status }} <br/> Note: {!!$ticket->note!!}</div>
            @endif

            <a href="{{ route('admin.tickets.index') }}" class="btn btn-link mt-3">← Back to List</a>
            </div>
        </div>
    </div>
    <script>
            tinymce.init({
                selector: 'textarea',
                plugins: [
                // Core editing features
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                // Your account includes a free trial of TinyMCE premium features
                // Try the most popular premium features until Jun 24, 2025:
                'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
                ],
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Muazzam Ali khan',
                mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
            });
        </script>
</x-app-layout>

