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
</x-layout>