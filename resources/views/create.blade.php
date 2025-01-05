@extends('layouts.app')

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        {{-- Success Message --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}.</p>
            @endforeach
        </div>
        @endif
        <h1 class="mb-4">Product Create</h1>
        <div class="py-4 bg-light rounded">
            <div class="container">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Product Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Clothing">Clothing</option>
                                    <option value="Home Appliances">Home Appliances</option>
                                </select>
                            </div>

                            <h5>Options</h5>
                            <div id="options-container">
                                <div class="row g-3 align-items-end mb-3 option-row">
                                    <div class="col-md-4 col-12">
                                        <input type="text" class="form-control" name="options[0][name]" placeholder="Option Name" required>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <input type="file" class="form-control" name="options[0][image]" required>
                                    </div>
                                    <div class="col-md-3 col-10">
                                        <input type="number" step="0.01" class="form-control" name="options[0][price]" placeholder="Price (৳)" required>
                                    </div>
                                    <div class="col-md-1 col-2">
                                        <button type="button" class="btn btn-primary" id="add-option"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        let optionIndex = 1;

        // Add Option Row
        $('#add-option').on('click', function() {
            let optionRow = `
                <div class="row g-3 align-items-end mb-3 option-row">
                    <div class="col-md-4 col-12">
                        <input type="text" class="form-control" name="options[${optionIndex}][name]" placeholder="Option Name" required>
                    </div>
                    <div class="col-md-4 col-12">
                        <input type="file" class="form-control" name="options[${optionIndex}][image]" required>
                    </div>
                    <div class="col-md-3 col-10">
                        <input type="number" step="0.01" class="form-control" name="options[${optionIndex}][price]" placeholder="Price (৳)" required>
                    </div>
                    <div class="col-md-1 col-2">
                        <button type="button" class="btn btn-danger remove-option"><i class="fa-solid fa-minus"></i></button>
                    </div>
                </div><hr>
            `;
            $('#options-container').prepend(optionRow);
            optionIndex++;
        });

        // Remove Option Row
        $(document).on('click', '.remove-option', function() {
            $(this).closest('.option-row').remove();
        });
    });
</script>
@endsection