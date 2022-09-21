<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item">{{$user->name}} - {{$user->email}} <a href="{{route('notify',['id' => $user->id])}}"> Enviar notificacion </a></li>
                        @endforeach  
                    </ul>
                </div>
                <h3>Notificaciones nuevas</h3>
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-group">
                        @foreach (Auth::user()->unreadNotifications as $notification)
                            <li class="list-group-item bg-success">{{$notification->data["name"]}} - {{$notification->data["message"]}} <a class="btn btn-danger" href="{{route('visto',['id' => $notification->id])}}"> Visto </a></li>
                        @endforeach  
                    </ul>
                </div>

                <h3>Notificaciones pasadas</h3>
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-group">
                        @foreach (Auth::user()->readNotifications as $notification)
                            <li class="list-group-item bg-secondary">{{$notification->data["name"]}} - {{$notification->data["message"]}} </li>
                        @endforeach  
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
