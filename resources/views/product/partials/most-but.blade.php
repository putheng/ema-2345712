<section class="pt-4">
  <!-- Heading-->
  <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
    <h2 class="h3 mb-0 pt-3 mr-3">The most recent Health, Beauty</h2>
    <div class="pt-3">
      <a class="btn btn-outline-accent btn-sm" href="{{ route('discount') }}">
        More products<i class="czi-arrow-right ml-1 mr-n1"></i>
      </a>
    </div>
  </div>
  <div class="cz-carousel cz-controls-static cz-controls-outside cz-dots-enabled pt-2">
    <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}">
      <!-- Product-->
      
      @foreach($products as $product)
        <div>
          <div class="card product-card card-static pb-3 text-center">
            {{-- <span class="badge badge-danger badge-shadow">Sale</span>
            <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist">
              <i class="czi-heart"></i>
            </button> --}}
            <a class="card-img-top d-block overflow-hidden" href="{{ route('show.product', $product) }}">
              <img style="width: 220px; height: 254px; margin: auto;" src="{{ $product->image->first()->product() }}" alt="Product">
            </a>
            <div class="card-body py-2 text-left">
              <a class="product-meta d-block font-size-xs pb-1" href="{{ route('show.product', $product) }}">{{ $product->category->name }}</a>
              <h3 class="product-title font-size-sm">
                <a href="{{ route('show.product', $product) }}">{{ $product->name }}</a>
              </h3>

              <div class="product-price">
                <span class="text-accent">{{ $product->formattedTaxPrice }}</span>
                @if($product->formattedMarketPrice)
                  <del class="font-size-sm text-muted">{{ $product->formattedMarketPrice }}</del>
                @endif
                {{-- <del class="font-size-sm text-muted">{{ $product->formattedTaxPrice }}</del> --}}
              </div>
            </div>
            {{-- <div class="product-floating-btn">
              <button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
            </div> --}}
          </div>
        </div>
      @endforeach


    </div>
  </div>
</section>