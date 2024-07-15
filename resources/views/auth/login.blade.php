<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1>Accedi</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                            <span class="text-danger fst-italic">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <span class="text-danger fst-italic">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Accedi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>