<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1>Libreria</h1>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h3>Ultimi libri inseriti</h3>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-between">
            @forelse ($books as $book)
                <div class="col-12 col-md-4">
                    <x-card :book="$book" />
                </div>
            @empty
                <h3>Non sono ancora stati inseriti dei libri. <a href="{{route('book.create')}}">Inseriscine uno</a></h3>
            @endforelse
        </div>
    </div>
</x-layout>