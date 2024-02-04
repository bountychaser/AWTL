<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Information</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .car-info {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .car-info img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .destruct-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Car Information</h1>

        <div class="car-info">
            <?php

            class Car
            {
                private $brand;
                private $color;

                public function __construct($brand, $color)
                {
                    $this->brand = $brand;
                    $this->color = $color;
                    echo "A new $this->color $this->brand car created.<br>";
                }


                public function getBrand()
                {
                    return $this->brand;
                }

                public function getColor()
                {
                    return $this->color;
                }

                public function displayInfo()
                {
                    echo "This is a {$this->getColor()} {$this->getBrand()}.<br>";
                }

                public function __destruct()
                {
                    echo "The {$this->getColor()} {$this->getBrand()} car is being destroyed.<br>";
                }
            }

            class SportsCar extends Car
            {
                private $speed;

                public function __construct($brand, $color, $speed)
                {
                    parent::__construct($brand, $color);
                    $this->speed = $speed;
                }


                public function getSpeed()
                {
                    return $this->speed;
                }

                public function displayInfo()
                {
                    echo "This is a {$this->getColor()} {$this->getBrand()} and can speed up to {$this->getSpeed()} mph.<br>";
                }
            }
            $car1 = new Car("Laborgini", "red");
            echo '<h2>Car Information</h2>';
            echo '<p>';
            $car1->displayInfo();
            echo '</p>';
            ?>
        </div>

        <div class="car-info">
            <?php
            $sportsCar1 = new SportsCar("Bugati Veyron", "red", 200);
            echo '<h2>Sports Car Information</h2>';
            echo '<p>';
            $sportsCar1->displayInfo();
            echo '</p>';
            ?>
        </div>

        <p class="destruct-message">Note:Above mentioned cars belongs to Chinmay Kamble.</p>
    </div>
</body>

</html>