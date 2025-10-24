@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
@if (session('message'))
<div class="todo__alert">
  <div class="todo__alert--success">{{ session('message') }}</div>
</div>
@endif
@if ($errors->any())
<div class="todo__alert todo__alert--error">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="todo__content">
  <form action="/todos" method="post" class="create-todo">
    @csrf
    <div class="create-todo__input"><input type="text" name="content" value="{{ old('content') }}"></div>
    <div class="create-todo__button"><button class="create-todo__button-submit" type="submit">作成</button></div>
  </form>
  <div class="todo-table">
    <table class="todo-table__inner">
      <tr class="todo-table__row">
        <th class="todo-table__heading">Todo</th>
      </tr>
      @foreach ($todos as $todo)
      <tr class="todo-table__row">
        <td class="todo-table__item">
          <form action="/todos/update" method="post" class="update-todo">
            @method('PATCH')
            @csrf
            <div class="update-todo__input"><input type="text" name="content" value="{{ $todo->content }}"></div>
            <input type="hidden" name="id" value="{{ $todo['id'] }}">
            <div class="update-todo__button">
              <button class="update-todo__button-submit" type="submit">更新</button>
            </div>
          </form>
        </td>
        <td class="todo-table__item">
          <form action="/todos/delete" method="post" class="delete-todo">
            @method('DELETE')
            @csrf
            <input type="hidden" name="id" value="{{ $todo['id'] }}">
            <div class="delete-todo__button">
              <button class="delete-todo__button-submit" type="submit">削除</button>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
