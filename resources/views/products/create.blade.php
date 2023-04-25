@extends('layout.app')
@section('content')
    <main class="container">
        <section>
            <form method="POST" action=" {{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="titlebar">
                    <h1>Add Product</h1>
                    <button>Save</button>
                </div>
                <div class="card">
                <div>
                        <label>Name</label>
                        <input type="text" name="name" >
                        <label>Description (optional)</label>
                        <textarea cols="10" rows="5"name='desc' ></textarea>
                        <label>Add Image</label>
                        <img src="" alt="" class="img-product"  id ="file-preview" />
                        <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                    </div>
                <div>
                        <label>Category</label>
                        <select  name="category" id="" >
                            @foreach (json_decode('{"smartPhone":"smartPhone", "smart Tv":"smart Tv", "laptop":"laptop"}',true)
                            as $optionkey => $optionvalue )
                                 <option value={{$optionkey}}>{{$optionvalue}}</option>
                            @endforeach
                           
                        </select>
                        <hr>
                        <label>Inventory</label>
                        <input type="text" class="input" name="quantity" >
                        <hr>
                        <label>Price</label>
                        <input type="text" class="input" name="price" >
                </div>
                </div>
                <div class="titlebar">
                    <h1></h1>
                    <button>Save</button>
                </div>
            </form>
        </section>
    </main>

    <script>
        function showFile(event){
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = document.getElementById('file-preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection