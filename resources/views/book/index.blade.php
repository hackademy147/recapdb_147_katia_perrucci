<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Lista dei libri</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @if(count($books) > 0)
                @foreach ($books as $book)
                <div class="col-12 col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{Storage::url($book->cover)}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->title}}</h5>
                                    <p class="card-text">Autore: {{$book->author}}</p>
                                    <p class="card-text"><small class="text-body-secondary">Data inserimento: {{$book->created_at->format('d/m/Y')}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h3>Non sono ancora stati inseriti dei libri. <a href="{{route('book.create')}}">Inseriscine uno</a></h3>
            @endif
        </div>
    </div>
</x-layout>