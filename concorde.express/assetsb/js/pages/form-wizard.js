$(document).ready(function() {
    var $validator = $("#wizardForm").validate({
        rules: {
            sender_name: {
                required: true
            },
            sender_phone: {
                required: true
		    },
		    sender_address: {
                required: true
		    },
		    sender_country: {
                required: true
		    },
		    sender_city: {
                required: true,
		    },
		    sender_postcode: {
                required: true
		    },
		    
		    rec_name: {
                required: true
            },
            rec_phone: {
                required: true
		    },
		    rec_address: {
                required: true
		    },
		    rec_country: {
                required: true
		    },
		    rec_city: {
                required: true,
		    },
		    
		    length: {
                required: true,
                number: true
		    },
		    width: {
                required: true,
                number: true
		    },
		    height: {
                required: true,
                number: true
		    },
		    weight: {
                required: true,
                number: true
		    },
		    content_desc: {
                required: true
		    },
		    quantity: {
                required: true
		    },
		    customs_value: {
                required: true
		    },
		    content_type: {
                required: true
		    }
        }
    });
 
    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-tabs',
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
        },
        'onNext': function(tab, navigation, index) {
            var $valid = $("#wizardForm").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
        'onTabClick': function(tab, navigation, index) {
            var $valid = $("#wizardForm").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
    });
    
    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true
    });
});