@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sukurti</div>

                <div class="card-body">
                    <form method="POST" action="{{route('unique_plant.store')}}">
                        <div class="form-group">
                            <label>Amžius mėnesiais</label>
                            <input type="number" name="age"  class="form-control">
                            <small class="form-text text-muted">Sodinuko amžius.</small>
                        </div>
                        <div class="form-group">
                            <label>Aukštis metrais</label>
                            <input type="number" step=".01" name="height"  class="form-control">
                            <small class="form-text text-muted">Sodinuko aukštis.</small>
                        </div>
                        <div class="form-group">
                            <label>Sveikata, proc.</label>
                            <input type="number" name="health"  class="form-control">
                            <small class="form-text text-muted">Sodinuko sveikata (nuo 0 iki 100).</small>
                        </div>
                        <select name="plant_id" class="form-control">
                            @foreach ($plant_types as $plant_type)
                            <option value="{{$plant_type->id}}">{{$plant_type->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        @csrf
                        <button type="submit" class="btn btn-success">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection