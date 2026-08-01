<form action="{{ route('payment.create', 'doku') }}" method="GET">
    @csrf
    <button class="btn-payment btn py-2 px-3">{{ get_phrase('Pay by Doku') }}</button>
</form>
