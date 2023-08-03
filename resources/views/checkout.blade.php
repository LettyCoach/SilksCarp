<form action="/checkout" method="POST">
    @csrf
    <input type="hidden" name="amount" value="100"> <!-- Replace with your desired amount -->
    <button type="submit">Checkout</button>
</form>
