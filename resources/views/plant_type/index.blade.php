@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Augalai</div>

        <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
              <th class="align-middle text-center">Nuotrauka</th>
              <th class="align-middle text-center">Pavadinimas</th>
              <th class="align-middle text-center">Vienmetis</th>
              <th class="align-middle text-center">Sodinukų kiekis</th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($plant_types as $plant_type)
            <tr>
              <td class="align-middle text-center">
                <?php if($plant_type->photo){ ?>
                  <img src="{{asset('plantPhotos/small/'.$plant_type->photo)}}" alt="photo" style="max-height:75px;max-width:75px;" width="auto" height="auto">
                <?php }?>
              </td>
              <td class="align-middle text-center">{{$plant_type->name}}</td>
              <td class="align-middle text-center"><input type="checkbox" class="form-control" disabled <?=$plant_type->checkBoxActivation()?>></td>
              <td class="align-middle text-center">{{$plant_type->UniquePlant()}}</td>
              <td class="align-middle text-center"><a class="btn btn-primary" href="{{route('plant_type.edit',[$plant_type])}}">EDIT</a></td>
              <td class="align-middle text-center"><form method="POST" action="{{route('plant_type.destroy', $plant_type)}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">DELETE</button>
                  </form>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection