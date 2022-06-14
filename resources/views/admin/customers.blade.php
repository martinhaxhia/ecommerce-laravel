@extends('admin.dashboard')

@section('content')
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="w-full flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    <h3 class="text-3xl text-bold">Customers </h3>
                    <div class="flex-1">
                        <table class="table" >
                            @if(!empty($users))
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ $user->full_image_url }}" class="cartImg" alt="Thumbnail">
                                        </td>
                                        <td>
                                            <p>{{ $user->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $user->email }}</p>
                                        </td>
                                        <td>
                                            <p>Active</p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
