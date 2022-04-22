<div>

    <div class="mt-6 mb-2 container-fluid-sm">
        <div class="row">

            <p class="h4 col-auto">Trier</p>

            <div class="col-auto name">
                <label for="registration" class="sr-only"></label>
                <input class="w-auto form-control d-inline-block" wire:model="registration" id="registration" name="registration" type="text" placeholder="Immatriculation">
            </div>

            <div class="col-auto function">
                <label for="brand" class="sr-only"></label>
                <select class="w-auto form-control d-inline-block" wire:model="brand" id="brand" name="brand" type="text" placeholder="Marque">
                    <option value="1">Renault</option>
                    <option value="2">Toyota</option>
                    <option value="3">Peugeot</option>
                </select>
            </div>
            
        </div>
    </div>

    @if ($vehicles->count() > 0 )
    <table class="text-center table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Désignation</th>
                <th scope="col">Marque</th>
                <th scope="col">Modèle</th>
                <th scope="col">Immatriculation</th>                    
                <th scope="col">Kilométrage</th>
                <th scope="col">Année d’acquisition</th>
                <th scope="col">Date de première mise en circulation</th>
                <th scope="col">Salarié affecté</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <th scope="row"><a class="text-black text-decoration-none" href='{{ route('vehicles.show',['vehicle' => $vehicle]) }}'>{{ $vehicle->id }}</a></th>
                    <td>{{ $vehicle->name }}</td>
                    <td>{{ $vehicle->brand_name }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->registration }}</td>
                    <td>{{ $vehicle->kilometer }}</td>     
                    <td>{{ $vehicle->year_of_manufacture }}</td>               
                    <td>{{ $vehicle->date_of_establishment->format('d/m/Y') }}</td>
                    <td>
                    @if($vehicle->employee)
                        {{$vehicle->employee->full_name}}
                    @else
                        Aucun
                    @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
                        <form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('delete')
                            <button class="bg-danger btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class='pagination'>
        {{ $vehicles->onEachSide(2)->links() }}
    </div>

    @else
        <span>Aucun véhicule enregistré</span>
    @endif
</div>
