<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <?php 
                $configuration = [];
                if($user->settings){
                    $configuration = $user->settings;
                    $configuration = json_decode($configuration->settings, true);
                }

                $product_details = [
                    [
                        'flower_name' => 'a',
                        'quantity' => 1,
                        'price' => 5
                    ],
                    [
                        'flower_name' => 'b',
                        'quantity' => 2,
                        'price' => 6
                    ]
                ];

                $product_cost = array_sum(array_column($product_details, 'price'));
            ?>
            <?php if(empty($configuration) || (isset($configuration['bouquet-image']) && $configuration['bouquet-image'] == 1)){ ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img class="img-fluid" src="https://www.artificialindustry.com/wp-content/uploads/2019/02/bloomy-2-1-768x768.png" width="500px" height="500px"/>
                    </div>
                </div>
            <?php } ?>
            <?php if(empty($configuration) || (isset($configuration['flower-details']) && $configuration['flower-details'] == 1)){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Flowers</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($product_details as $products) { ?>
                                    <tr>
                                        <td>{{ $products['flower_name'] }}</td>
                                        <td>{{ $products['quantity'] }}</td>
                                        <td>&euro; {{ $products['price'] }}</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>    
                    </div>
                </div>
            <?php } ?>  
            <?php if(empty($configuration) || (isset($configuration['pricing-summary']) && $configuration['pricing-summary'] == 1)){ ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <table class="table table-bordered float-md-right align-self-end" width="100%">
                            <tr>
                                <td>Bouquet Cost</td>
                                <td>&euro; {{ $product_cost }}</td>
                            </tr>
                            <tr>
                                <td>Logistics Cost</td>
                                <td>&euro; {{ 5 }}</td>
                            </tr>
                            <tr>
                                <td>Total Cost</td>
                                <td>&euro; {{ $product_cost + 5 }}</td>
                            </tr>
                    </table>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>