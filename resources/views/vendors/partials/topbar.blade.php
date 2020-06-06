<div class="page-title-overlap bg-accent pt-4">
  <div class="container d-flex flex-wrap flex-sm-nowrap justify-content-center justify-content-sm-between align-items-center pt-2">
    <div class="media media-ie-fix align-items-center pb-3">
      <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;">
        <img class="rounded-circle" src="{{ $user->avatar() }}" alt="Createx Studio"></div>
      <div class="media-body pl-3">
        <h3 class="text-light font-size-lg mb-1">{{ $store->name }}</h3>
        <span class="badge badge-success">
          <i class="czi-user-circle mr-1"></i>{{ $user->name }}</span>
      </div>
    </div>
    <div class="d-flex">
      <div class="text-sm-right mr-5">
        <div class="text-light font-size-base">
          Total products
          <span class="badge badge-secondary font-size-sm text-body align-middle ml-2">
            {{ $user->products()->count() }}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>