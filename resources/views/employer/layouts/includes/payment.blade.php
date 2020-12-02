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
        // console.log(response)
        $.ajax({
          type: "post",
          url: "{{ url('employer/work-payment') }}",
          data: {
            "_token": "{{ csrf_token() }}",
            'running_job_id': id,
            'user_id': "{{Auth::user()->id}}",
            'amount': amount,
            'status': response.status,
          },
          success: function (response) {
            //console.log(response)
            if(response == true){
              window.location.reload();
            }else{
                window.location.reload();
            }
          }
        });

    },
    onClose: function(){
      alert('Are you sure you want to close and cancel this payment?');
    }
    });
    handler.openIframe();
    }
    </script>
