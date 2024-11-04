@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Adăugați produs</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Titlul <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Introduceți titlul"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Rezumat <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Descriere</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="is_featured">Este prezentat</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Da                        
        </div>
              {{-- {{$categories}} --}}

        <div class="form-group">
          <label for="cat_id">Categorie <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--Selectează orice categorie--</option>
              @foreach($categories as $key => $cat_data)
                  <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group d-none" id="child_cat_div">
          <label for="child_cat_id">Sub Categorie</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--Selectează orice categorie--</option>
              {{-- @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
              @endforeach --}}
          </select>
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">Preț(RON) <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="Introduceți prețul"  value="{{old('price')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">Reducere(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Introduceți reducerea"  value="{{old('discount')}}" class="form-control">
          @error('discount')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="size">Mărime</label>
          <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
              <option value="">--Selectează orice mărime--</option>
              <option value="S">Mic (S)</option>
              <option value="M">Mediu (M)</option>
              <option value="L">Mare (L)</option>
              <option value="XL">Foarte mare (XL)</option>
          </select>
        </div>

        <div class="form-group">
          <label for="brand_id">Brand</label>
          {{-- {{$brands}} --}}

          <select name="brand_id" class="form-control">
              <option value="">--Selectează Brand--</option>
             @foreach($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->title}}</option>
             @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="condition">Condiție</label>
          <select name="condition" class="form-control">
              <option value="">--Selectați Condiție--</option>
              <option value="default">Implicit</option>
              <option value="new">Nou</option>
              <option value="hot">Fierbinte</option>
          </select>
        </div>

        <div class="form-group">
          <label for="stock">Cantitate <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="Introduceți cantitate"  value="{{old('stock')}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Fotografie <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Alege
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Activ</option>
              <option value="inactive">Inactiv</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Resetează</button>
           <button class="btn btn-success" type="submit">Trimiteți</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
      placeholder: "Scrie o scurtă descriere.....",
      tabsize: 2,
      height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
      placeholder: "Scrie o scurtă descriere.....",
      tabsize: 2,
      height: 150
      });
    });
    // $('select').selectpicker();

    </script>

    <script>
    $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
      url:"/admin/category/"+cat_id+"/child",
      data:{
      _token:"{{csrf_token()}}",
      id:cat_id
      },
      type:"POST",
      success:function(response){
      if(typeof(response) !='object'){
      response=$.parseJSON(response)
      }
      // console.log(response);
      var html_option="<option value=''>----Selectează sub categorie----</option>"
      if(response.status){
      var data=response.data;
      // alert(data);
      if(response.data){
        $('#child_cat_div').removeClass('d-none');
        $.each(data,function(id,title){
        html_option +="<option value='"+id+"'>"+title+"</option>"
        });
      }
      else{
      }
      }
      else{
      $('#child_cat_div').addClass('d-none');
      }
      $('#child_cat_id').html(html_option);
      }
      });
    }
    else{
    }
    })
    </script>
@endpush