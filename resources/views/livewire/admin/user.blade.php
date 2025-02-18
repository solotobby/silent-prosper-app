<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <h2 class="content-heading">List of Users</h2>
    <table class="table">
        <thead class="thead-dark table-responsive">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">When Created</th>
            
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email }}</td>
                <td>{{$user->gender }}</td>
                <td>{{$user->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $users->links() }}
    </div>


</div>
