<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Email</title>
</head>
<body>
    <h4>Welcome To Famms Online Purchase</h4>


    <h4>Name : {{$userAddress['name']}}</h4>
    <h4>SurName : {{$userAddress['surname']}}</h4>
    <h4>Phone : {{$userAddress['phone']}}</h4>
    <h4>Address : {{$userAddress['address']}}</h4>
    <h4>City : {{$userAddress['city']}}</h4>
    <h4>Postal Code : {{$userAddress['postal_code']}}</h4>
    <h4>E-mail : {{$userAddress['email']}}</h4>
    <h4>Country : {{$userAddress['country']}}</h4>


        <table class="table table-striped table-bordered">
            <thead>

                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cartItems  as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['quantity']}}</td>
                    <td>{{$item['price']}}</td>
                </tr>
            @endforeach
                <tr>
                    <td>Grand Total</td>
                    <td>{{$total}} EGP</td>
                </tr>
            </tbody>
        </table>

</body>
</html>
