@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Product</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Product Title</label>
                                <input type="text" class="form-control" id="email2" required name="title" placeholder="Enter  Product Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                                <label for="email2">Product  Content</label>
                                <textarea type="text" rows="5" class="form-control" id="email2" required name="content" placeholder="Enter Product Description"></textarea>
                                <small style="color:red; font-weight:500">
                                @error('content')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                                <label for="email2">Product Price (#) </label>
                                <input type="number" class="form-control" id="email2" required name="price" placeholder="Enter Product Price">
                                <small style="color:red; font-weight:500">
                                @error('price')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Product Discount (%) </label>
                                <input type="number" class="form-control" id="email2" required name="discount" placeholder="Enter Product Discount">
                                <small style="color:red; font-weight:500">
                                @error('discount')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>


                            <div class="form-group">
                                <label for="email2">Product Poster Image</label>
                                <input type="file" class="form-control" id="email2" accept="image/*" required name="image" >
                                <small style="color:red; font-weight:500">
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Product  Image 2</label>
                                <input type="file" class="form-control" id="email2" accept="image/*" required name="image2" >
                                <small style="color:red; font-weight:500">
                                @error('image2')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Product  Image 3</label>
                                <input type="file" class="form-control" id="email2" accept="image/*" required name="image3" >
                                <small style="color:red; font-weight:500">
                                @error('image2')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Add Product</button>
                
                        </div>
                           </form>
                    </div>
                    
                </div>
                
            </div>

@endsection