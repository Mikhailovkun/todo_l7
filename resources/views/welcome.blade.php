@extends('layouts.app')
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width: 40%">
        <h1 class="display-2 text-white">Todo</h1>
        <h2 class="text-white">What next? Add something to your list</h2>
        <form action="{{route('todo.store')}}" method="POST">
        @csrf
        <div class="input-group mb-3 w-100">
            <input type="text" class="form-control form-control-lg" name="title" placeholder="Type here.." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn-success" type="submit" id="button-addon2">Add to the list</button>
            </div>
        </div>
        </form>

        <h2 class="text-white pt-2"> My Todo List:</h2>
        <div class="bg-white w-100">
            @foreach($todos as $todo)
            <div class="w-100 d-flex align-items-center justify-content-between">
                <div class="p-4">
                @if($todo->completed == 0)
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff3b30"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12.522,10.4l-3.559,3.562c-0.172,0.173-0.451,0.176-0.625,0c-0.173-0.173-0.173-0.451,0-0.624l3.248-3.25L8.161,6.662c-0.173-0.173-0.173-0.452,0-0.624c0.172-0.175,
                    0.451-0.175,0.624,0l3.738,3.736C12.695,9.947,12.695,10.228,12.522,10.4 M18.406,10c0,4.644-3.764,8.406-8.406,8.406c-4.644,0-8.406-3.763-8.406-8.406S5.356,1.594,10,1.594C14.643,
                    1.594,18.406,5.356,18.406,10M17.521,10c0-4.148-3.374-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.147,17.521,10"></path>
                </svg>
                @else

                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#34c759"
                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>

                </svg>
                @endif {{$todo->title}}</div>

                <div class="mr-4 d-flex align-items-center">
                @if($todo->completed == 0)
                <form action="{{route('todo.update', $todo->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" name="completed" value="1" hidden>
                    <button class="btn btn-success">Mark it as Completed</button>
                </form>
                    @else
                    <form action="{{route('todo.update', $todo->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" name="completed" value="0" hidden>
                        <button class="btn btn-warning">Mark it as Uncompleted</button>
                    </form>
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit m1-4" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c14638"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                    <line x1="16" y1="5" x2="19" y2="8"/>
                </svg>
                <form action="{{route('todo.destroy', $todo->id)}}" method="POST">
                @csrf
                @method('DELETE')
                    <button class="border-0 bg-transparent m1-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c14638"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                        <line x1="4" y1="7" x2="20" y2="7"/>
                        <line x1="10" y1="11" x2="10" y2="17"/>
                        <line x1="14" y1="11" x2="14" y2="17"/>

                    </svg></button>
                </div>
            </div>
            @endforeach
        </div>
        </div>

    </div>
@endsection
