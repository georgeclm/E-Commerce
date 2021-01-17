@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>$ {{ $total }}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$ 0</td>
                </tr>
                <tr>
                    <td>Delivery Charges</td>
                    <td>$ 10</td>
                </tr>
                <tr>
                    <td>Total amount</td>
                    <td>$ {{ $total + 10 }}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <form action="/action_page.php">
                <div class="form-group">
                    <textarea type="email" placeholder="Enter your address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="pwd">Payment Method:</label> <br><br>
                    <input type="radio" name="payment" id=""><span> Online Payment</span> <br><br>
                    <input type="radio" name="payment" id=""><span> Cash On Delivery</span><br><br>
                    <input type="radio" name="payment" id=""><span> Shop Outlet</span> <br><br>
                </div>
                <button type="submit" class="btn btn-default">Pay Now</button>
            </form>
        </div>
    </div>
</div>

@endsection