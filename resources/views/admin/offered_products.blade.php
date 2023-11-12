@extends('../layout/admin')


@section('dashboard')
<div style="width:80%;margin:auto">
 
    @if(session('success'))

    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Success</p>
            <p class="text-sm"> {{ session('success') }}</p>
          </div>
        </div>
    </div>
@endif

@if(session('delete'))

<div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
    <div class="flex">
      <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
      <div>
        <p class="font-bold">Success</p>
        <p class="text-sm"> {{ session('delete') }}</p>
      </div>
    </div>
</div>
@endif




    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif


    <form action="{{ route('dashboard.add.offer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
          <label for="name" class="form-label">Product Name:</label>
          <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="comment">Description:</label>
            <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
          </div>
          <div class="mb-3 mt-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text"  class="form-control" name="price" id="price">
          </div>
          <div class="mb-3 mt-3">
            <label for="price_after_discount" class="form-label">Price after discount:</label>
            <input type="text"  class="form-control" name="price_after_discount" id="price_after_discount">
          </div>
          <div class="mb-3 mt-3">
            <label for="formFile" class="form-label">Upload Product Image</label>
            <input class="form-control" name="url_image" type="file" id="formFile">
          </div>
          
      
        <button style="background:#0d6efd;" type="submit" class="btn btn-primary">Submit</button>
    </form> 


    <div style="overflow-x:auto;">
        <table class="table mt-5 mb-5" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th style="white-space: nowrap;" scope="col">Discounted Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody style="vertical-align:middle">
                @forelse ($all_products as $item)
                    <tr class="first-table">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price_after_discount }}</td>
                        <td><img width="70px" height="70px" src="/{{ $item->url_image }}" alt="{{ $item->name }}"></td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>
                            <button class="btn btn-danger" id="delete"><a href="#" onclick="submitForm()">Delete</a></button>
                        </td>
                        <form style="display: none" id="deleteForm" action="{{ route('dashboard.deleteProductOffer', $item) }}" method="post">
                            <!-- Include CSRF token for Laravel forms -->
                            @csrf
                            <!-- Add other form elements as needed -->
                        </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <h1 class="mt-1" style="font-size: 1.5rem; text-align: center;">There are no products.</h1>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    
    

    {{ $all_products->links() }}
   
</div>
@endsection