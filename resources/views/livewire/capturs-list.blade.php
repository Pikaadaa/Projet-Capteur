<div>
    <div class="mt-5 mb-4">
        <div class="w-auto row">

            <p class="h4 col-auto">Filtrer</p>

            <div class="col-auto device w-auto">
                <label for="device" class="sr-only"></label>
                <input class="w-auto form-control d-inline-block" wire:model="device" id="device" name="device" type="text" placeholder="Clé de l'appareil">
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

    @if ($capturs->count() > 0 )
    <div class="table-responsive-xl">
        <table class="text-center table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Device</th>
                    <th scope="col">Immatriculation du véhicule</th>
                    <th scope="col">Batterie</th>
                    <th scope="col">Actions</th>                    
                </tr>
            </thead>

            <tbody>
                @foreach($capturs as $captur)
                    <tr>
                        <th scope="row">{{ $captur->id }}</th>
                        <td><a class="text-primary text-decoration-underline" href='{{ route('capturs.show',['captur' => $captur]) }}'>{{ $captur->device }}</a></td>
                        <td>
                            @if($captur->vehicle != null )
                                {{ $captur->vehicle->registration }}
                            @else
                                Aucune voiture assignée
                            @endif
                        </td>
                        <td>{{ $captur->battery }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('capturs.edit',['captur' => $captur]) }}">Modifier</a>
                            <form action="{{ route('capturs.destroy',['captur' => $captur]) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bg-danger btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="mt-5 d-flex justify-content-center align-self-center">
            <span class="h2">Aucun capteur trouvé</span>
        </div>
    @endif

    <div class="pagination">
        {{ $capturs->links() }}
    </div>
</div>