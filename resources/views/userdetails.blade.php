@extends('layouts.app')
@section('content')
<div class="flex flex-col w-full">
    <div class="flex items-center justify-between w-full">
        <h2 class="text-lg font-semibold text-gray-700">Users</h2>
        <div class="flex items-center space-x-2">
            <button class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-gray-500">
                <i class="bx bx-search"></i>
            </button>
            <button class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-gray-500">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
        </div>
    </div>

    <div class="mt-10 text-right">
        <a href="" class="bg-blue-600 text-white p-3 rounded-lg">Add User</a>
    </div>

    <div class="mt-2">
        <div class="mt-4">
            <div class="overflow-x-auto bg-white rounded-lg shadow-xs">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b">
                        <th class="px-4 py-3">S.N</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Role</th>
                            
                            <th class="px-4 py-3">Created At</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php $sn = 1; @endphp
                        @foreach($users as $user)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">{{ $sn++ }}</td>
                            <td class="px-4 py-3 border">{{ $user->name }}</td>
                            <td class="px-4 py-3 border">{{ $user->email }}</td>
                            <td class="px-4 py-3 border">{{ $user->role }}</td>
                           
                            <td class="px-4 py-3 border">{{ $user->created_at }}</td>
                            <td class="px-4 py-3 border">
                                <a href="" class="bg-blue-500 text-white p-2 rounded-lg">Edit</a>
                                <a href="" class="bg-red-500 text-white p-2 rounded-lg" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
