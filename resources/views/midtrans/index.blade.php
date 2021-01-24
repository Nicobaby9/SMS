@extends('landing-page.index')

@section('content')

<div id="example">
	<button v-on:click="handlePayButton" type="">Bayar</button>
</div>

@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1" type="text/javascript"></script>
	<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-tYtu_Nk04rToSxt4"></script>
	<script type="text/javascript"> 
		var vm = new Vue({
			el: '#example',
			data: function () {
				return {
					data_midtrans : {
						'transaction_details' : {
							'order_id' : '0d76f0e0-c5bf-4a4f-b633-a28790967809',
							'gross_amount' : 75000
						},
						'customer_details' : {
							'first_name' : 'Lando',
							'last_name' : 'Norris',
							'email' : 'lnorris@gmail.com',
							'phone' : '081515790222'
						},
					}
				}
			}, 

			methods: {
				handlePayButton: function(event) {
					console.log('success')

					this.$http.post('/api/generate', {data : this.data_midtrans}).then(response => {
						// console.log(response.data)
						snap.pay(response.data.data.token)
					}, response => {
						console.log('error : ' + response)
					});
				}
			}
		})
	</script>
@endsection