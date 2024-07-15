<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Modifica del libro {{$book->title}}</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{route('book.update', $book)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo del libro</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$book->title}}">
                        @error('title')
                            <small class="text-danger fst-italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Autore</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{$book->author}}">
                        @error('author')
                            <small class="text-danger fst-italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <p>Copertina Attuale</p>
                        <img src="{{Storage::url($book->cover)}}" alt="{{$book->title}}" class="img-fluid w-25">
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Copertina</label>
                        <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover">
                        @error('cover')
                            <small class="text-danger fst-italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="plot" class="form-label">Trama</label>
                        <textarea name="plot" id="plot" class="form-control @error('plot') is-invalid @enderror">{{$book->plot}}</textarea>
                        @error('plot')
                            <small class="text-danger fst-italic">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark">Modifica libro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>