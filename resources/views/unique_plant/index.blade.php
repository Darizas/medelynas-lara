@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Augalų sodinukai</div>

        <div class="card-body">
          <table class="table table-striped">
            <thead>
            <tr>
              <th class="align-middle text-center">Amžius, mėn.</th>
              <th class="align-middle text-center">Aukštis, m.</th>
              <th class="align-middle text-center">Stovis, proc.</th>
              <th>Augalas</th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($unique_plants as $unique_plant)
            <tr>
              <td class="align-middle text-center">{{$unique_plant->age}}</td>
              <td class="align-middle text-center">{{$unique_plant->height}}</td>
              <td class="align-middle text-center">{{$unique_plant->health}}</td>
              <td class="align-middle">{{$unique_plant->PlantType->name}}</td>
              <td class="align-middle text-center"><a class="btn btn-primary" href="{{route('unique_plant.edit',[$unique_plant])}}">EDIT</a></td>
              <td class="align-middle text-center"><form method="POST" action="{{route('unique_plant.destroy', $unique_plant)}}">
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