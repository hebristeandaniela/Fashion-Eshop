@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Editați eticheta postării</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-tag.update', $postTag->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Titlul</label>
          <input id="inputTitle" type="text" name="title" placeholder="Introduceți titlul"  value="{{$postTag->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{(($postTag->status == 'active') ? 'selected' : '')}}>Activ</option>
            <option value="inactive" {{(($postTag->status == 'inactive') ? 'selected' : '')}}>Inactiv</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Actualizează</button>
        </div>
      </form>
    </div>
</div>

@endsection
