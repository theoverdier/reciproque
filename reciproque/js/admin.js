$(document).ready(function() {
	$('.openModal').click(function() {
		$('.modal').modal('toggle');
		$('.modal form input[type=hidden]').val($(this).data('billet'));

		$('.carousel-item:not(:first-child)').remove();
		$(this).find('.listPhotos img').each(function() {
			$('.carousel-inner').append('<div class="carousel-item">' + $(this).prop('outerHTML') + '</div>');
		});
	})
});
