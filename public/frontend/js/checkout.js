$(document).ready(function () {
    $('.razorpay_btn').click(function (e) {
        e.preventDefault();

        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var country = $('.country').val();
        var pincode = $('.pincode').val();

        if (!firstname) {

            fname_error = "First Name is requried";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else {
            fname_error = "";
            $('#fname_error').html('');
        }


        if (!lastname) {

            lname_error = "Last Name is requried";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else {
            lname_error = "";
            $('#lname_error').html('');
        }

        if (!email) {

            email_error = "Email Name is requried";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else {
            email_error = "";
            $('#email_error').html('');
        }


        if (!phone) {

            phone_error = "Phone Number is requried";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else {
            phone_error = "";
            $('#phone_error').html('');
        }

        if (!address1) {

            address1_error = "Address first is requried";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
        }
        else {
            address1_error = "";
            $('#address1_error').html('');
        }

        if (!address2) {

            address2_error = "Address secound is requried";
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
        }
        else {
            address2_error = "";
            $('#address2_error').html('');
        }

        if (!city) {

            city_error = "First Name is requried";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else {
            city_error = "";
            $('#city_error').html('');
        }

        if (!state) {

            state_error = "First Name is requried";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else {
            state_error = "";
            $('#state_error').html('');
        }

        if (!country) {

            country_error = "First Name is requried";
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }
        else {
            country_error = "";
            $('#country_error').html('');
        }

        if (!pincode) {

            pincode_error = "First Name is requried";
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }
        else {
            pincode_error = "";
            $('#pincode_error').html('');
        }


        if (fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != '') {

            return false;

        } else {
            var data = {
                'firstname': firstname,
                'lastname': lastname,
                'email': email,
                'phone': phone,
                'address1': address1,
                'address2': address2,
                'city': city,
                'state': state,
                'country': country,
                'pincode': pincode
            }
            $.ajax({
                url: '/proceed-to-pay',
                type: 'POST',
                data: data,
                success: function (response) {
                    var options = {
                        "key": "rzp_test_IvpQR3fpCKwzLU",
                        "amount": response.total * 100,
                        "currency": "INR",
                        "name": response.firstname + ' ' + response.lastname,
                        "description": "Thanks you for choosing us",
                        "image": "https://example.com/your_logo",
                        // "order_id": "order_9A33XWu170gUtm", 
                        "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                        "handler": function (response) {
                            alert(response.razorpay_payment_id);
                            $.ajax({
                                url: '/place-order',
                                type: 'POST',
                                data: {
                                    'fname': response.firstname,
                                    'lname': response.lastname,
                                    'email': response.email,
                                    'phone': response.phone,
                                    'address1': response.address1,
                                    'address2': response.address2,
                                    'city': response.city,
                                    'state': response.state,
                                    'country': response.country,
                                    'pincode': response.pincode,
                                    'payment_mode': "Paid By Razorpay",
                                    'payment_id': response.razorpay_payment_id,
                                },
                                success: function (response) {
                                alert(response.status);
                                }
                            });
                        },
                        "prefill": {
                            "name": response.firstname + ' ' + response.lastname,
                            "email": response.email,
                            "contact": response.phone
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }

            });
        }
    });
});