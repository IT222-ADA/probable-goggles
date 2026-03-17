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

        $acount1 = new Account("123");

        $account = new BankAccount(100);
        $customer = new Customer("JOHN DOE","johndoe@gamil.com","USA","555-1234");

        echo "<h1>Customer Information</h1>";
        echo "Customer Name: " . $customer->getName() . "<br>";
        echo "Customer Email: " . $customer->getEmail() . "<br>";
        echo "Customer Address: " . $customer->getAddress() . "<br>";
        echo "Customer Phone: " . $customer->getContact() . "<br>";

        // $account->accountNumber = "1";

        // $account->deposit(50);
        // $account->deposit(500);

        // $account->withdraw(650);
        // $account->deposit(100)
        //         ->deposit(100)
        //         ->withdraw(50);

        $account->transaction(200, 'deposit');
        $account->transaction(50, 'withdraw');

        $customer->setName("John Doe");
        $customerName = $customer->getName();
        
        echo "<br>";
        echo "<h1>Account Information</h1>";
        echo "Account Number: " . $account1->getaccountnumber() . "<br>";
        echo "Balance: $" .$account->getbalance(). "<br>";
        ?>
</body>
</html>