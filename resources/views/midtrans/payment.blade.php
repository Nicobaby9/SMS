@extends('landing-page.index')

@section('content')

<button id="pay-button">Bayar</button>
    <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>
<div class="container-fluid mt-4">
    <div class="row">
        <section class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Apa yang anda ingin tanyakan?</h5>
                    <br>
                    <form role="form" action="{{ route('forum.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>NISN</label>
                            <input name="subject" type="text" class="form-control" placeholder="Judul Post" value="{{ old('subject') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Fullname</label>
                            <input name="subject" type="text" class="form-control" placeholder="Judul Post" value="{{ old('subject') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Fullname</label>
                            <select name="" multiple>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group" required> 
                            {!! NoCaptcha::renderJs() !!}
                            {!! app('captcha')->display(['data-theme' => 'dark']) !!}
                        </div>

                        <input type="submit" class="btn btn-info" value="Save">
                        <br><br>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@section('js')
	<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-tYtu_Nk04rToSxt4"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result){
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result){
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result){
                  document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection