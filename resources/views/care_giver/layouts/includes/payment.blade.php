<script>
    function payWithPaystack(amount, id){
    var handler = PaystackPop.setup({
    key: '{{env('PAYSTACK_KEY')}}',
    email: "{{Auth::user()->email}}",
    amount: amount+'00',
    currency: "NGN",
    ref: Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    firstname: "{{Auth::user()->first_name}}",
    lastname: "{{Auth::user()->last_name}}",
    // label: "Optional string that replaces customer email"
    metadata: {
     custom_fields: [
        {
            display_name: "{{Auth::user()->email}}" + " " + "{{Auth::user()->email}}",
            variable_name: "mobile_number",
            value: "{{Auth::user()->mobile}}"
        }
     ]
    },
    callback: function(response){
        $.ajax({
          type: "post",
          url: "make-payment",
          data: {
            "_token": "{{ csrf_token() }}",
            'plan_id': id,
            'user_id': "{{Auth::user()->id}}",
            'plan': '1',
            'amount': amount,
            'status': response.status,
            'reference': response.reference,
            'message': response.message,
            'transaction': response.transaction,
            'trxref': response.trxref,
          },
          success: function (response) {
            // console.log(response)
            if(response == true){
              window.location.href = "{{ url('care-giver/transactions') }}";
            }else{
              window.location.href = "{{ url('care-giver/plans') }}";
            }
          }
        });

      // alert('success. transaction ref is ' + response);
      // console.log(response);

    },
    onClose: function(){
      alert('Are you sure you want to close and cancel this payment?');
    }
    });
    handler.openIframe();
    }
    </script>
