
                <table class="table table-bordered" style="margin: 10px 0 10px 0;">
	                <tr>
                    <th>S/N</th>
	                    <th>Name</th>
	                    <th>Email</th>
                        <th>Title</th>
	                    <th>Description</th>
	                </tr>
	                @foreach($users as $user)
	                <tr>
                    <td>
	                        {{ $loop->index +1 }}
	                    </td>
	                    <td>
	                        {{ $user->name }}
	                    </td>
	                    <td>
	                        {{ $user->email }}
	                    </td>
                        <td>
	                        {{ $user->title }}
	                    </td>
                        <td>
	                        {{ $user->description }}
	                    </td>
	                </tr>
	                @endforeach
	            </table>
                {{ $users->links('livewire.livewire-pagination') }}