<x-app-layout>
    <div class="overflow-hidden bg-white shadow-sm p-14 sm:ml-64 sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form id="announcementForm" action="{{ route('announcement.update', $announcement->slug) }}" enctype="multipart/form-data"
                method="POST">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="title" id="title"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('title', $announcement->title) }}" required>
                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="editor" class="block text-sm font-medium text-gray-700">Konten</label>
                    <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm min-h-[300px]">
                        {!! $announcement->content !!}
                    </div>
                    <input type="hidden" name="content" id="content"
                        value="{{ old('content', $announcement->content) }}">
                    @error('content')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid items-center grid-cols-3">
                    <div class="mb-4">
                        <label for="visibility" class="block text-sm font-medium text-gray-700">Visibility</label>
                        <select name="visibility" id="visibility">
                            <option value="public" {{ $announcement->visibility == 'public' ? 'selected' : '' }}>
                                Public</option>
                            <option value="private" {{ $announcement->visibility == 'private' ? 'selected' : '' }}>
                                Private</option>
                        </select>
                        @error('visibility')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('announcement.index') }}"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-gray-300 border border-transparent rounded-md hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25">
                        Kembali
                    </a>
                    <button type="submit" id="submitButton"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'direction': 'rtl'
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                },
                placeholder: 'Tulis konten artikel di sini...',
            });

            // Populate from old value if exists
            @if (old('content'))
                quill.root.innerHTML = {!! json_encode(old('content')) !!};
            @endif

            // Update hidden input when editor content changes
            quill.on('text-change', function() {
                document.getElementById('content').value = quill.root.innerHTML;
            });

            // Ensure form submission captures editor content
            document.querySelector('form').addEventListener('submit', function() {
                document.getElementById('content').value = quill.root.innerHTML;
            });

            // Handle image upload
            var toolbar = quill.getModule('toolbar');
            toolbar.addHandler('image', function() {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();

                input.onchange = function() {
                    var file = input.files[0];
                    if (file) {
                        var formData = new FormData();
                        formData.append('image', file);
                        formData.append('_token', '{{ csrf_token() }}');

                        // Upload to server
                        fetch('{{ route('image.upload') }}', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(result => {
                                if (result.success) {
                                    // Insert image into editor
                                    const range = quill.getSelection();
                                    quill.insertEmbed(range.index, 'image', result.url);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                };
            });
        });

        document.getElementById('submitButton').addEventListener('click', function(event){
            event.preventDefault();

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data yang anda simpan akan diperbarui!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, simpan!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if(result.isConfirmed){
                    document.getElementById('announcementForm').submit();
                }
            });
        });
    </script>
</x-app-layout>
