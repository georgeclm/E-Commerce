@extends('layouts.master')
@section('title', 'Order - OSSI')

@section('content')
    <div class="container">
        <div class="col-sm-10">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>Amount</td>
                        <td>Rp. {{ number_format($total) }}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>Rp. 0</td>
                    </tr>
                    <tr>
                        <td>Delivery Charges</td>
                        <td>Rp. 10</td>
                    </tr>
                    <tr>
                        <td>Total amount</td>
                        <td>Rp. {{ number_format($total + 10) }}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <form action="/orderplace" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="address" type="email" placeholder="Enter your address" class="form-control"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Payment Method:</label> <br><br>
                        <input type="radio" value="transfer" class="form-check-input" name="payment" id=""><span> Transfer</span> <br><br>
                        <input type="radio" value="cash" class="form-check-input" name="payment" id=""><span> Cash On
                            Delivery</span><br><br>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Pay Now</button>
                </form>
            </div>
        </div>
    </div>

@endsection
