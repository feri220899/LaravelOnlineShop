<div>
    <div class="modal-body overflow-auto" style="max-height: 80vh; scrollbar-width: none;">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                @foreach ($get_carts as $key => $cart)
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-body p-2 shadow">
                            <div class="row">
                                <div class="col-5 text-center">
                                    <img src="{{ asset('storage/' . $cart->product->image) }}" alt="user-avatar"
                                        class="img-fluid" style="object-fit: cover; width: 100%; height: 150px;">
                                </div>
                                <div class="col-7">
                                    <h2 class="lead"><b>{{ $cart->product->product_name }}</b></h2>
                                    <span class="text-muted text-sm">Price : Rp. {{ number_format($cart->product->price, 0, ',', '.') }}</span><br>
                                    <span class="text-muted text-sm"><b>Stock : </b> {{ $cart->product->stock }}</span>
                                    <div class="py-1">
                                        <button class="btn btn-outline-dark btn-sm py-0"
                                            wire:click='cartCounter("{{ $key }}", -1)'>
                                            <span class="font-weight-bold mx-2">-</span>
                                        </button>
                                        <span class="mx-2">{{ $quantity_count[$key] }}</span>
                                        @php
                                            $disable = $quantity_count[$key] >= $cart->product->stock ? 'disabled' : '';
                                        @endphp
                                        <button {{$disable}} class="btn btn-outline-dark btn-sm py-0"
                                            wire:click='cartCounter("{{ $key }}",1)'>
                                            <span class="font-weight-bold mx-2">+</span>
                                        </button>

                                        {{$price_qount[$key]}}
                                    </div>
                                    <div class="mt-2 d-flex">
                                        <button class="btn btn-sm btn-block btn-outline-dark mr-2">
                                            <span class="font-weight-bold px-2">Checkout</span>
                                        </button>
                                        <button class="btn btn-sm btn-outline-dark">
                                            <div class="fas fa-trash"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-block btn-outline-dark">Checkout All</button>
    </div>
</div>
