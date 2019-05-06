@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    <table>
        <thead>
        <th>Name</th>
        <th>E-Mail</th>
        <th>User</th>
        <th>Author</th>
        <th>Admin</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form action="{{ route('admin.assign') }}" method="post">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                    {{ csrf_field() }}
                    <td><button type="submit">Assign Roles</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="margin-top:20px">
        
            <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">payment id</th>
                        <th scope="col">user name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Info</th>
                        <th scope="col"> Total price </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                        <tr>
                            <th scope="row"> {{ $order->id }} </th>
                            <td> {{ $order->payment_id }} </td>
                            <td> {{ $order->user->name }} </td>
                            <td> {{ $order->address }} </td>
                            <td>
                                
                            @foreach($order->cart->items as $item)
                                {{ $item['item']->info }}
                            @endforeach

                            </td>
                            <td> {{ $order->cart->totalPrice }} </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
    
    </div>
@endsection