(function() {
	// duplicate on indexblade
	var form = $('#new-question-form');


	form.find('select#type').on('change', function() {
		var selected = $(this).find('option:selected').val();

		form.find('li').hide() // hide all list items to begin
			.filter('.all, li.' + selected).show() // and then show only the ones for the associated input type
			.end()
			.filter('.radio, .boolean, .text').val('');

		var answerInput = form.find('.boolean #answer');
		if ( selected === 'text' || selected === 'radio' ) {
			answerInput.attr('disabled', 'disabled');
		} else {
			answerInput.removeAttr('disabled');
		}
	});

	$('select#type').trigger('change');
})();