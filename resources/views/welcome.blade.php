@extends('layouts.app')
@section('content')
@if (Auth::guest())
@else
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width: 40%">
            <h1 class="display-2 text-white">Todo</h1>
            <h2 class="text-white">Add something to your list</h2>
            <form action="{{route('todo.store')}}" method="POST">
                @csrf
                <div class="input-group mb-3 w-100">
                    <input type="text" class="form-control form-control-lg" name="title" placeholder="Type here.." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit" id="button-addon2">Add to the list</button>
                    </div>
                </div>
            </form>

            <h2 class="text-white pt-2"> My Todo List:</h2>
            <div class="card bg-light">
                @forelse($todos as $todo)
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
                                    <button class="btn btn-success">Completed</button>
                                </form>
                            @else
                                <form action="{{route('todo.update', $todo->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="completed" value="0" hidden>
                                    <button class="btn btn-warning">Uncompleted</button>
                                </form>
                        @endif

                        <!-- редактирование -->

                            <a class="inlane-block" href="{{route('todo.edit', $todo->id)}}">
                                <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="black" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>

                            <!-- удаление -->
                            <form action="{{route('todo.destroy', $todo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="border-0 bg-transparent m1-2">
                                    <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-trash" fill="black" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                @empty
                    <p class="p-4">Nothing added to your todo list!</p>
                @endforelse
            </div>
        </div>

    </div>
@endif
@endsection

