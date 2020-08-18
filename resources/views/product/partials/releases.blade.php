<section class="pb-5 mb-lg-3">
      <!-- Heading-->
      <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 mr-2">The most recent releases</h2>
        <div class="pt-3">
          {{-- <select class="custom-select">
            <option>All categories</option>
            <option>Photos</option>
            <option>Graphics</option>
            <option>UI Design</option>
            <option>Web Themes</option>
            <option>Fonts</option>
            <option>Add-Ons</option>
          </select> --}}
        </div>
      </div>
      <!-- Grid-->
      <div class="row pt-2 mx-n2">
        <!-- Product-->

        @foreach($products as $product)
          <div class="col-lg-2 col-md-2 col-sm-6 px-2 mb-grid-gutter">
            <div class="card product-card-alt">
              <div class="product-thumb">
                {{-- <button class="btn-wishlist btn-sm" type="button"><i class="czi-heart"></i></button>

                <div class="product-card-actions">
                  <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="#"><i class="czi-eye"></i></a>

                  <button class="btn btn-light btn-icon btn-shadow font-size-base mx-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart"></i></button>

                </div> --}}

                  <a class="product-thumb-overlay" href="{{ route('show.product', $product) }}"></a>
                    <img style="width: 220px; height: 224px; margin: auto;" src="{{ optional($product->image->first())->product() }}" alt="Product">

                </div>
              <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                  <div class="text-muted font-size-xs mr-1">
                    by <a class="product-meta font-weight-medium" href="#" 
                      {{-- href="{{ route('vendors.show', $product->user->store) }}" --}}
                    >
                      {{ $product->ownerName }}

                    </a>in 
                    <a class="product-meta font-weight-medium" href="#">
                      {{ $product->category->name }}
                    </a>
                  </div>

                  {{-- <div class="star-rating">
                    <i class="sr-star czi-star-filled active"></i>
                    <i class="sr-star czi-star-filled active"></i>
                    <i class="sr-star czi-star-filled active"></i>
                    <i class="sr-star czi-star-filled active"></i>
                    <i class="sr-star czi-star-filled active"></i>
                  </div> --}}
                </div>
                <h3 class="product-title font-size-sm mb-2">
                  <a href="{{ route('show.product', $product) }}">{{ $product->name }}</a>
                </h3>
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                  {{-- <div class="font-size-sm mr-2">
                    <i class="czi-cart text-muted mr-1"></i>
                    21<span class="font-size-xs ml-1">Sales</span>
                  </div> --}}
                  <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">
                    {{ $product->formattedTaxPrice }}
                    @if($product->formattedMarketPrice)
                      <del class="font-size-sm text-muted">{{ $product->formattedMarketPrice }}</del>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Product-->
        @endforeach


      </div>
      <!-- More button-->
      <div class="text-center">
        <a class="btn btn-outline-accent" href="{{ url('/category') }}">
          View more products<i class="czi-arrow-right font-size-ms ml-1"></i>
        </a>
      </div>
    </section>