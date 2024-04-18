@extends('admin.layouts.master')

@section('content')
    <div class="p-6">
        User Content

        <div id="demo_info" class="box"></div>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>SL</th>
                <th>Username</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        {{ ($user->status == \App\Enums\UserEnum::STATUS_ACTIVE) ? 'Active' : (($user->status == \App\Enums\UserEnum::STATUS_INACTIVE) ? 'Inactive' : 'Block') }}
                    </td>
                    <td>
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>


    </div>
@endsection

@push('after-scripts')

    <script>
        function eventFired(type) {
            let n = document.querySelector('#demo_info');
            n.innerHTML +=
                '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
            n.scrollTop = n.scrollHeight;
        }

        new DataTable('#example')
            .on('order.dt', () => eventFired('Order'))
            .on('search.dt', () => eventFired('Search'))
            .on('page.dt', () => eventFired('Page'));
    </script>

@endpush
