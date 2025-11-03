@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
@if (session('message'))
<div class="category__alert category__alert--success">
  <p>{{ session('message') }}</p>
</div>
@endif
@if ($errors->any())
<div class="category__alert category__alert--error">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="category__content">
  <form action="/categories" method="post" class="create-form">
    @csrf
    <div class="create-form__input">
      <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div class="create-form__button"><button class="create-form__button-submit" type="submit">作成</button></div>
  </form>
  <div class="category-table">
    <table class="category-table__inner">
      <tr class="category-table__row">
        <th class="category-table__heading">category</th>
      </tr>
      @foreach ($categories as $category)
      <tr class="category-table__row">
        <td class="category-table__item">
          <form action="/categories/update" method="post" class="update-form">
            @method('PATCH')
            @csrf
            <div class="update-form__input">
              <input type="text" name="name" value="{{ $category['name'] }}">
              <input type="hidden" name="id" value="{{ $category['id'] }}">
            </div>
            <div class="update-form__button"><button class="update-form__button-submit" type="submit">更新</button></div>
          </form>
        </td>
        <td class="category-table__item">
          <form action="/categories/delete" method="post" class="delete-form">
            @method('DELETE')
            @csrf
            <input type="hidden" name="id" value="{{ $category['id'] }}">
            <div class="delete-form__button"><button class="delete-form__button-submit" type="submit">削除</button></div>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
