<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow">
            <div class="container-fluid">
                <h1 class="h3 mb-4">Edit Product</h1>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('products.update', $product) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @include('products._form')

                            <div class="mt-4">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
