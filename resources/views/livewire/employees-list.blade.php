<div class="container">
    <div class="mt-5 mb-4 container">
        <div class="w-auto row">

            <p class="h4 col-auto">Filtrer</p>

            <div class="col-auto name w-auto">
                <label for="name" class="sr-only"></label>
                <input class="w-auto form-control d-inline-block" wire:model="name" id="name" name="name" type="text" placeholder="Nom">
            </div>

            <div class="col-auto function w-auto">
                <label for="function" class="sr-only"></label>
                <input class="w-auto form-control d-inline-block" wire:model="function" id="function" name="function" type="text" placeholder="Fonction">
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

    @if ($employees->count() > 0 )
    <div class="table-responsive-xl">
        <table class="text-center table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">Date d'anniverssaire</th>
                    <th scope="col">Actions</th>                    
                </tr>
            </thead>

            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <th scope="row">{{ $employee->id }}</th>
                        <td><a class="text-primary text-decoration-underline" href='{{ route('employees.show',['employee' => $employee]) }}'>{{ $employee->full_name }}</a></td>
                        <td>{{ $employee->function }}</td>
                        <td>
                            @if($employee->birthday_at != null )
                                {{ $employee->birthday_at->format('d/m/Y') }}
                            @else
                                Aucune date renseignée
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('employees.edit',['employee' => $employee]) }}">Modifier</a>
                            <form action="{{ route('employees.destroy',['employee' => $employee]) }}" class="d-inline-block" method="POST">
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
            <span class="h2">Aucun employé trouvé</span>
        </div>
    @endif

    <div class="pagination">
        {{ $employees->links() }}
    </div>

</div>
