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
                    <x-card :book="$book" />
                </div>
                @endforeach
            @else
                <h3>Non sono ancora stati inseriti dei libri. <a href="{{route('book.create')}}">Inseriscine uno</a></h3>
            @endif
        </div>
    </div>
</x-layout>