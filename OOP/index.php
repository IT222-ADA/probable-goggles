<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK</title>
</head>
<body>
    <?php 
        include 'class.php';

        $account = new BankAccount();
        $customer = new Customer();

        $account->accountNumber = "1";
        $account->setbalance(100);

        $account->deposit(50);
        $account->deposit(500);

        $account->withdraw(650);
        $account->deposit(100)
                ->deposit(100)
                ->withdraw(50);

        $customer->setName("John Doe");
        $customerName = $customer->getName();
        
        echo "Customer Name: " . $customerName . "<br>";
        echo "Account Number: " . $account->getaccountnumber() . "<br>";
        echo "Balance: $" .$account->getbalance(). "<br>";
        ?>
</body>
</html>