<div class="sidebar-fixed-enabled">
<footer class="bg-dark pt-5">
	<div class="px-lg-3 pt-2 pb-4">
		<div class="mx-auto px-3" style="max-width: 80rem;">
			<div class="row">
				<div class="col-xl-2 col-lg-3 col-sm-4 pb-2 mb-4">
					
					<div class="mt-n1">
						<a class="d-inline-block align-middle" href="#">
							<img class="d-block mb-4" width="117" src="/images/logo-50.png" alt="E-Market Asia"/>
						</a>
					</div>
					<div class="btn-group dropdown disable-autohide">
						<button class="btn btn-outline-light border-light btn-sm dropdown-toggle px-2" type="button" data-toggle="dropdown">
							<img class="mr-2" width="20" src="/images/products/en.png" alt="English"/>
							Eng / {{ get_currency()->current() }}
						</button>
						<ul class="dropdown-menu">
							<li class="dropdown-item">
								<select id="languagex" class="custom-select custom-select-sm">
									<option value="USD" {{ optional(auth()->user())->currency == 'USD' ? 'selected' : '' }}>$ USD</option>
									<option value="KHR" {{ optional(auth()->user())->currency == 'KHR' ? 'selected' : '' }}>៛ KHR</option>
									<option value="THB" {{ optional(auth()->user())->currency == 'THB' ? 'selected' : '' }}>฿ THB</option>
								</select>
							</li>
							<li>
								<a class="dropdown-item pb-1" href="#">
									<img class="mr-2" width="20" src="/images/icons/flag-of-Cambodia.png" alt="Cambodia"/>
									KH
								</a>
							</li>
							<li>
								<a class="dropdown-item pb-1" href="#">
									<img class="mr-2" width="20" src="/images/icons/flag-of-Thailand.png" alt="THI"/>
									THI
								</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">
									<img class="mr-2" width="20" src="/images/products/en.png" alt="EN"/>
									EN
								</a>
							</li>
						</ul>
					</div>
					
				</div>
				<div class="col-xl-3 col-lg-4 col-sm-4">
					<div class="widget widget-links widget-light pb-2 mb-4">
						<h3 class="widget-title text-light">Product catalog</h3>
						<ul class="widget-list">
							@foreach($categories as $category)
								<li class="widget-list-item">
									<a class="widget-list-link" href="#">{{ $category->name }}</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-sm-4">
					<div class="widget widget-links widget-light pb-2 mb-4">
						<h3 class="widget-title text-light">Company</h3>
						<ul class="widget-list">
							<li class="widget-list-item">
								<a class="widget-list-link" href="#">About us</a>
							</li>
							<li class="widget-list-item">
								<a class="widget-list-link" href="{{ route('stores') }}">Store locator</a>
							</li>

							<li class="widget-list-item">
								<a class="widget-list-link" href="{{ route('contact') }}">Contacts</a>
							</li>
							<li class="widget-list-item">
								<a class="widget-list-link" href="{{ url('/auth/login') }}">Become a society</a>
							</li>
							@if(auth()->check())
								<li class="widget-list-item">
									<a class="widget-list-link" href="{{ route('userlogout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logoutform').submit();">
                                        Logout
                                    </a>

                                    <form id="logoutform" action="{{ route('userlogout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</li>
							@endif
						</ul>
					</div>
					<div class="widget widget-light pb-2 mb-4">
						<h3 class="widget-title text-light">Follow us</h3>
						<a class="social-btn sb-light sb-twitter mr-2 mb-2" href="#"><i class="czi-twitter"></i></a>
						<a class="social-btn sb-light sb-facebook mr-2 mb-2" href="#"><i class="czi-facebook"></i></a>
						<a class="social-btn sb-light sb-instagram mr-2 mb-2" href="#"><i class="czi-instagram"></i></a>
						<a class="social-btn sb-light sb-youtube mr-2 mb-2" href="#"><i class="czi-youtube"></i></a>
					</div>
				</div>
				<div class="col-xl-4 col-sm-8">
					<newsletter/>
					<div class="widget pb-2 mb-4">
						<h3 class="widget-title text-light pb-1">Download our app</h3>
						<div class="d-flex flex-wrap">
							<div class="mr-2 mb-2"><a class="btn-market btn-apple" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">App Store</span></a></div>
							<div class="mb-2"><a class="btn-market btn-google" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">Google Play</span></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-darker px-lg-3 py-3">
		<div class="d-sm-flex justify-content-between align-items-center mx-auto px-3" style="max-width: 80rem;">
			<div class="font-size-xs text-light opacity-50 text-center text-sm-left py-3">© All rights reserved.</div>
			<div class="py-3"><img class="d-block mx-auto mx-sm-left" width="187" src="/images/products/cards-alt.png?v=2" alt="Payment methods"/>
			</div>
		</div>
	</div>
</footer>
</div>
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#languagex').on('change', function(){
			window.location = '{{ route('currency') }}?c='+ this.value
		})
	})
</script>
@endsection