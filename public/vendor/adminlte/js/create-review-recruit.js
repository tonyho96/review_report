$(document).ready(function(){
	$('a.rating').on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		var container = $this.parents('.table-div');
		var id = container.attr('id');

		var comment_id = id + '_comment';
		var last_rating = container.find('input[type=hidden][name="'+ id +'"]').val();
		var last_comment = container.find('input[type=hidden][name="'+ comment_id +'"]').val();
		$.confirm({
		    title: '',
		    animation: 'rotate',
    		closeAnimation: 'rotate',
		    content: '' +
		    '<form action="" class="rating-form">' +
		    '<div class="form-group">' +
		    '<select class="rating-bar">\
		    	<option value=""></option>\
                <option value="1">1</option>\
                <option value="2">2</option>\
                <option value="3">3</option>\
                <option value="4">4</option>\
                <option value="5">5</option>\
            </select>' +
		    '<textarea placeholder="Your comment" class="comment form-control"/></textarea>' +
		    '</div>' +
		    '</form>',
		    buttons: {
		        formSubmit: {
		            text: 'Submit',
		            btnClass: 'btn-blue',
		            action: function () {
		                var comment = this.$content.find('.comment').val().trim();
		                var rating_point = this.$content.find('select.rating-bar').val();
		                if ( rating_point == '' )
		                	rating_point = 0;
		                if( comment == '' && ( rating_point == 1 || rating_point == 5 ) ){
		                    $.alert('provide a valid comment');
		                    return false;
		                }
		                // Handle here
		                container.find('.rating-comment').text(comment);
		                container.find('.rating-point').text(rating_point);
		                
		                var comment_id = id + '_comment';
		                container.find('input[type=hidden][name="'+ id +'"]').val(rating_point);
		                container.find('input[type=hidden][name="'+ comment_id +'"]').val(comment);
		            }
		        },
		        cancel: function () {
		        },
		    },
		    onContentReady: function () {
		        $('.rating-bar').barrating({
		            theme: 'fontawesome-stars',
		            readonly: false,
		            allowEmpty: true,
		            initialRating: true
		        });
		        $('.rating-bar').barrating('set', last_rating);
		        $('.comment').val(last_comment);

		        // bind to events
		        var jc = this;
		        this.$content.find('form').on('submit', function (e) {
		            // if the user submits the form by pressing enter in the field.
		            e.preventDefault();
		            jc.$$formSubmit.trigger('click'); // reference the button and click it
		        });
		    }
		});
	});
});