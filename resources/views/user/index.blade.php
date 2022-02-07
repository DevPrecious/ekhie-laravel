@extends('layouts.dashboard')
@section('content')

<main>
    <div class="board">
        @include('layouts.desktop')
        <div class="content product-content">
            <h4>Products overview</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Amount</th>
                        <th scope="col">id</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>regular ticket</td>
                        <td>15,000</td>
                        <td>#7574</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>vip holiday ticket</td>
                        <td>25,000</td>
                        <td>#4794</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>vvip ticket</td>
                        <td>1,000,000</td>
                        <td>#4758</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</main>


@endsection