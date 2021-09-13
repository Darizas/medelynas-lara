@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Sukurti</div>

            <div class="card-body">
               <form method="POST" action="{{route('plant_type.store')}}" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Augalo pavadinimas</label>
                      <input type="text" name="name"  class="form-control">
                      <small class="form-text text-muted">Augalo pavadinimas.</small>
                  </div>
                  <div class="form-group">
                      <input type="checkbox" name="is_yearling" value="on" class="form-control-input" id="formCheck">
                      <label class="form-check-label" for="formCheck">Vienmetis</label>
                      <small class="form-text text-muted">Pažymėkite, jei vienmetis.</small>
                  </div>
                  <div class="form-group">
                      <label>Augalo nuotrauka</label>
                      <input type="file" name="photo"  class="form-control-file">
                      <small class="form-text text-muted">Augalo nuotrauka.</small>
                  </div>
                  @csrf
                  <button class="btn btn-success" type="submit">ADD</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection