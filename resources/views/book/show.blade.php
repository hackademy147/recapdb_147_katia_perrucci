<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">{{ $book->title }}</h2>
            </div>
        </div>
    </div>
    <div class="container my-5 shadow bg-light p-2">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="{{Storage::url($book->cover)}}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6">
                <h3>Trama:</h3>
                <p>{{$book->plot}}</p>
                <h4>Autore: {{$book->author}}</h4>
                <span class="text-muted">Inserito il {{$book->created_at->format('l, d/m/Y H:m')}}</span>
                <div class="mt-5 d-flex justify-content-around">
                    <a href="{{route('book.edit', $book)}}" class="btn btn-warning">Modifica</a>
                    <form action="{{route('book.destroy', $book)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <a href="{{route('book.index')}}">Torna alla lista dei libri</a>
            </div>
        </div>
    </div>
</x-layout>