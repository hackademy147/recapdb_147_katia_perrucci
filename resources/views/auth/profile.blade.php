<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1>Ecco la tua pagina profilo</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Autore</th>
                            <th scope="col">Creato il</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->books as $book)
                            <tr>
                                <th scope="row">{{$book->id}}</th>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>