<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form id="paymentForm" action="" method="POST">
        <input type="text" name="username" placeholder="name">
        <br>
        <input type="email" id="email" name="email" placeholder="email">
        <br>
        <input type="text" id="amount" name="amount" placeholder="amount">
        <br>
        <input type="text" name="phone" placeholder="phone">
        <input type="submit" style="color:blue" name="pay" value="PAY">
    </form>


</body>


<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
            key: 'pk_test_fe27bd519b1346a18ca00c5af5e8c1788fd0c74e', // Replace with your public key
            email: document.getElementById("email").value,
            amount: document.getElementById("amount").value * 100,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let message = 'Payment complete! Reference: ' + response.reference;
                alert(message);
            }
        });
        handler.openIframe();
    }
</script>

<script src="https://js.paystack.co/v1/inline.js"></script>

</html>