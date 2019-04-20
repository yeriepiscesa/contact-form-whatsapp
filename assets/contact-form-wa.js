( function( $ ){
    $( document ).ready( function(){
        $( '#sp-form-contact-button' ).click( function( event ){
            event.preventDefault();
            var the_phone = sp_contact_form.phone;
            var the_purpose = sp_contact_form.purpose;
            var _name = $( '#sp-contact-name' ).val();
            var _city = $( '#sp-contact-city' ).val();
            if( _name != '' && _city != '' ) {

                var myDate = new Date();
                var hrs = myDate.getHours();
                var greet;
                if (hrs < 11)
                    greet = 'Selamat Pagi';
                else if (hrs >= 11 && hrs <= 15)
                    greet = 'Selamat Siang';
                else if (hrs > 15 && hrs < 18)
                    greet = 'Selamat Sore';
                else if (hrs >= 18 && hrs <= 24)
                    greet = 'Selamat Malam';

                var the_text = greet + ', Saya ' + _name + ' dari ' + _city + ' ' + the_purpose + '. ';
                the_text = window.encodeURIComponent( the_text );
                var url = 'https://api.whatsapp.com/send?phone=' + the_phone + '&text=' + the_text;
                var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
                var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

                if( isSafari && iOS ) {
                    location = url;
                } else {
                    window.open( url, '_blank' );
                }

            } else {
                alert( 'Masukkan nama dan kota' );
            }
        } );        
    } );
} )( jQuery );