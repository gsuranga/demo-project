/*
*	@name							Show Password
*	@descripton						
*	@version						1.3
*	@requires						Jquery 1.5
*
*	@author							Jan Jarfalk
*	@author-email					jan.jarfalk@unwrongest.com
*	@author-website					http://www.unwrongest.com
*
*	@special-thanks					Michel Gratton
*
*	@licens							MIT License - http://www.opensource.org/licenses/mit-license.php
*/
(function($j){
     $j.fn.extend({
         showPassword: function(c) {	
            
            // Setup callback object
			var callback 	= {'fn':null,'args':{}}
				callback.fn = c;
			
			// Clones passwords and turn the clones into text inputs
			var cloneElement = function( element ) {
				
				var $jelement = $j(element);
					
				$jclone = $j("<input />");
					
				// Name added for JQuery Validation compatibility
				// Element name is required to avoid script warning.
				$jclone.attr({
					'type'		:	'text',
					'class'		:	$jelement.attr('class'),
					'style'		:	$jelement.attr('style'),
					'size'		:	$jelement.attr('size'),
					'name'		:	$jelement.attr('name')+'-clone',
					'tabindex' 	:	$jelement.attr('tabindex')
				});
					
				return $jclone;
			
			};
			
			// Transfers values between two elements
			var update = function(a,b){
				b.val(a.val());
			};
			
			// Shows a or b depending on checkbox
			var setState = function( checkbox, a, b ){
			
				if(checkbox.is(':checked')){
					update(a,b);
					b.show();
					a.hide();
				} else {
					update(b,a);
					b.hide();
					a.show();
				}
				
			};
            
            return this.each(function() {
            	
            	var $jinput					= $j(this),
            		$jcheckbox 				= $j($jinput.data('typetoggle'));
            	
            	// Create clone
				var $jclone = cloneElement($jinput);
					$jclone.insertAfter($jinput);
				
				// Set callback arguments
            	if(callback.fn){	
            		callback.args.input		= $jinput;
            		callback.args.checkbox	= $jcheckbox;
					callback.args.clone 	= $jclone;
            	}
				

				
				$jcheckbox.bind('click', function() {
					setState( $jcheckbox, $jinput, $jclone );
				});
				
				$jinput.bind('keyup', function() {
					update( $jinput, $jclone )
				});
				
				$jclone.bind('keyup', function(){ 
					update( $jclone, $jinput );
					
					// Added for JQuery Validation compatibility
					// This will trigger validation if it's ON for keyup event
					$jinput.trigger('keyup');
					
				});
				
				// Added for JQuery Validation compatibility
				// This will trigger validation if it's ON for blur event
				$jclone.bind('blur', function() { $jinput.trigger('focusout'); });
				
				setState( $jcheckbox, $jinput, $jclone );
				
				if( callback.fn ){
					callback.fn( callback.args );
				}

            });
        }
    });
})(jQuery);
