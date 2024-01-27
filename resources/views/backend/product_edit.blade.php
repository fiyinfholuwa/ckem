@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Product</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Product Title</label>
                                <input type="text" class="form-control" id="email2" required value="{{$product->title}}" name="title" placeholder="Enter  Product Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                                <label for="email2">Product  Content</label>
                                <textarea type="text" rows="5" class="form-control" id="email2" required name="content" placeholder="Enter Product Description">{{$product->content}}</textarea>
                                <small style="color:red; font-weight:500">
                                @error('content')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                                <label for="email2">Product Price (#) </label>
                                <input type="number" class="form-control" id="email2" required value="{{$product->price}}" name="price" placeholder="Enter Product Price">
                                <small style="color:red; font-weight:500">
                                @error('price')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Product Discount (%) </label>
                                <input type="number" class="form-control" id="email2" value="{{$product->discount}}" required name="discount" placeholder="Enter Product Discount">
                                <small style="color:red; font-weight:500">
                                @error('discount')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>


                            <div class="form-group">
                                <label for="email2">Product Poster Image</label>
                                <input type="file" class="form-control" id="email2" accept="image/*"  name="image" >
                                <img height="60" width="60" src="{{asset($product->image)}}" />
                                <small style="color:red; font-weight:500">
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Product  Image 2</label>
                                <input type="file" class="form-control" id="email2" accept="image/*"  name="image2" >
                                <img height="60" width="60" src="{{asset($product->image2)}}" />
                                <small style="color:red; font-weight:500">
                                @error('image2')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Product  Image 3</label>
                                <input type="file" class="form-control" id="email2" accept="image/*"  name="image3" >
                                <img height="60" width="60" src="{{asset($product->image3)}}" />
                                <small style="color:red; font-weight:500">
                                @error('image2')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Product</button>
                
                        </div>
                           </form>
                    </div>
                    
                </div>
                
            </div>

@endsection