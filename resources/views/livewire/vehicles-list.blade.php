<div class='container'>
    <div class="mt-5 mb-4">
        <div class="w-auto row">

            <p class="h4 col-auto">Trier</p>

            <div class="col-auto w-auto">
                <label for="registration" class="sr-only"></label>
                <input class="w-auto form-control d-inline-block" wire:model="registration" id="registration" name="registration" type="text" placeholder="Immatriculation">
            </div>

            <div class="col-auto w-auto">
                <label for="brand" class="sr-only"></label>
                <select class="w-auto form-select d-inline-block" wire:model.lazy="brand" id="brand" name="brand" type="text">
                    <option value="">Toutes les marques</option>
                    <option value="1">Renault</option>
                    <option value="2">Toyota</option>
                    <option value="3">Peugeot</option>
                </select>
            </div>

            <div class="col-md-4 ml-auto w-auto">
                <label for="perPage" class="sr-only"></label>
                <select class="w-auto form-select d-inline-block" wire:model.lazy="perPage" id="perPage" name="perPage" type="text">
                    @for($i=5; $i <=20; $i += 5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <p class="d-inline-block">Résultats par pages</p>
            </div>
            
        </div>
    </div>

    @if ($vehicles->count() > 0 )
    <div class="table-responsive-xl ">
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
                    <th scope="col">Capteur affecté</th>
                    <th scope="col">Salarié affecté</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <th scope="row">{{ $vehicle->id }}</th>
                        <td><a class="text-primary text-decoration-underline" href='{{ route('vehicles.show',['vehicle' => $vehicle]) }}'>{{ $vehicle->name }}</a></td>
                        <td>{{ $vehicle->brand_name }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->registration }}</td>
                        <td>{{ $vehicle->kilometer }}</td>     
                        <td>{{ $vehicle->year_of_manufacture }}</td>               
                        <td>{{ $vehicle->date_of_establishment->format('d/m/Y') }}</td>
                        <td>
                        @if($vehicle->capturs()->count() > 0)
                            @foreach($vehicle->capturs as $captur)
                                {{ $captur->device }}
                            @endforeach
                        @else   
                            Aucun
                        @endif
                        </td>
                        <td>
                        @if($vehicle->employee)
                            {{ $vehicle->employee->full_name }}
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
            {{ $vehicles->links() }}
        </div>
    </div>
    @else
        <div class="mt-5 d-flex justify-content-center align-self-center">
            <span class="h2">Aucun véhicule trouvé</span>
        </div>
    @endif
</div>
