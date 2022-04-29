@extends('frontend')


@section('content')
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold">You have added to Cart </h3>
                      <div class="flex-1">
                        <table class="table" >
                          @if(!empty($cartItems))
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>
                                <span >Quantity</span>
                              </th>
                              <th> Price</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr>
                              <td>
                                  <img src="{{ $item->attributes->image }}" class="cartImg" alt="Thumbnail">
                              </td>
                              <td>
                                  <p >{{ $item->name }}</p>
                              </td>
                              <td >
                                <div >
                                  <div >

                                    <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                    />
                                    <button type="submit" >update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td >
                                <span >
                                    ${{ $item->price }}
                                </span>
                              </td>
                              <td >
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button >Remove</button>
                              </form>

                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                          @endif
                        </table>
                          <div class="buttons">
                              <form action="{{ route('cart.clear') }}" method="POST">
                                  @csrf
                                  <button class="btn btn-warning">Remove All Cart</button>
                              </form>
                              <h4> Total: ${{ Cart::getTotal() }}</h4>
                          </div>
                      </div>
                    </div>
                  </div>
            </div>
        </main>
    @endsection

