<div>
    <div class="py-10 mx-auto max-w-7xl">
        <div>
            <a href="{{ route('home') }}" class="flex flex-row gap-5 text-white hover:opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>
                back to home</a>
        </div>
        <div class="py-4">
            <h1 class="text-white">Students</h1>
        </div>
        <hr class="opacity-25">
        <div class="py-5">
            <h2 class="text-xl text-white">Add Students</h2>

            <form wire:submit="save" class="py-2">
                
                <div class="grid grid-cols-1 gap-4 md:grid-cols-4 lg:grid-cols-4">
                    <div class="flex flex-col">
                        <label for="first_name" class="text-white">First Name</label>
                        <input type="text" name="first_name" required autocomplete="off" wire:model="first_name" class="p-2 rounded" tabindex="-1">
                    </div>

                    <div class="flex flex-col">
                        <label for="last_name" class="text-white">Last Name</label>
                        <input type="text" name="last_name" required autocomplete="off" wire:model="last_name" class="p-2 rounded">
                    </div>

                    <div class="flex flex-col">
                        <label for="email" class="text-white">Email</label>
                        <input type="email" name="email" required autocomplete="off" wire:model="email" class="p-2 rounded">
                    </div>

                    <div class="flex flex-col">
                        <label for="first_name" class="text-white">Birtdate</label>
                        <input type="date" name="birthday" required autocomplete="off" wire:model="birthdate" class="p-2 rounded">
                    </div>

                    <div class="flex flex-col">
                        <label for="first_name" class="text-white">Class</label>
                        <select name="classes" id="" required wire:model="class_id">
                            <option value="">Select Class</option>
                            @foreach ($classes as $c)
                                <option value="{{ $c->id }}">{{ $c->class_name.' ('.$c->school_year.')' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="px-5 py-2 mt-5 font-bold text-white transition-all bg-green-500 rounded hover:shadow hover:shadow-green-400">Save</button>

            </form>
        </div>
        <hr class="opacity-25">
        <div class="py-5">
            <h2 class="text-xl text-white">Student List</h2>
            <div class="py-4">
                <!-- component -->
                <div class="">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded shadow-md">
                            <thead>
                                <tr class="text-gray-700 bg-blue-gray-100">
                                    <th class="px-4 py-3 text-left">ID</th>
                                    <th class="px-4 py-3 text-left">First Name</th>
                                    <th class="px-4 py-3 text-left">Last Name</th>
                                    <th class="px-4 py-3 text-left">Email</th>
                                    <th class="px-4 py-3 text-left">Birthday</th>
                                    <th class="px-4 py-3 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-blue-gray-900">
                                @forelse ($students as $s)
                                    <tr class="border-b border-blue-gray-200" wire:key="{{ $s->id }}">
                                        <td class="px-4 py-3">{{ $s->id }}</td>
                                        <td class="px-4 py-3">{{ $s->first_name }}</td>
                                        <td class="px-4 py-3">{{ $s->last_name }}</td>
                                        <td class="px-4 py-3">{{ $s->email }}</td>
                                        <td class="px-4 py-3">{{ date('F j, Y', strtotime($s->birthdate)) }}</td>
                                        <td class="px-4 py-3">
                                            <a href="#" class="font-medium text-red-600 hover:text-red-800" wire:click="delete({{ $s->id }})" wire:confirm="Are you sure?">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-5 text-center"><p>No Record</p></td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                        <div class="py-2">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @script
        <script>
            $wire.on('student-created', () => {
                // alert('success');
                $.notify("Success!",'success');
                document.forms[0].reset();
            });
        </script>
    @endscript
</div>
                                      