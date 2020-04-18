<section class="pt-4">
	<!-- Heading-->
	<div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4">
		<h2 class="h3 mb-0 pt-3 mr-3">Discounted products</h2>
		<div class="pt-3">
			<a class="btn btn-outline-accent btn-sm" href="{{ route('discount') }}">
				More products<i class="czi-arrow-right ml-1 mr-n1"></i>
			</a>
		</div>
	</div>
	<div class="cz-carousel cz-controls-static cz-controls-outside cz-dots-enabled">
		<discount-products endpoint="discounts"/>
	</div>
</section>