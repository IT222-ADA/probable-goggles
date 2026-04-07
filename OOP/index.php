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

        $account1 = new Account("123");
        $account2 = new Account("222");
        $account3 = new Account("333");

        $saveAccount = new SavingAccount(100, 3);
        $checkAccount = new CheckingAccount(200,50);
        $saveAccount1 = new CheckingAccount(0,50);

        $customer1 = new Customer("JOHN","J@gmail.com","OC","123");
        $customer2 = new Customer("CARLO","C@gmail.com","OC","222");

        $customer1->OpenAccount($account1,$saveAccount);
        $customer2->OpenAccount($account2,$checkAccount);
        $customer2->OpenAccount($account3,$saveAccount1);

        //create bank

        $bank = new Bank();
        $bank->addCustomer($customer1);
        $bank->addCustomer($customer2);
        // $bank->removeCustomer($customer2);

        echo "verifying.. <br>";
        if($bank->verifyCustomer($customer1)){
            echo $customer1->getName(). " is a customer";
        }else {
            echo $customer1->getName(). " is not a customer";
        }
        echo "<br>";
        echo "verifying.. <br>";
        if($bank->verifyCustomer($customer2)){
            echo $customer2->getName(). " is a customer";
        }else {
            echo $customer2->getName(). " is not a customer";
        }

        //process
        $bank->processTransaction($customer1->getAccounts()[0]['bankaccount'], 200);
        $bank->processTransaction($customer1->getAccounts()[0]['bankaccount'], -50);
        $bank->processTransaction($customer2->getAccounts()[0]['bankaccount'], 200);
        $bank->processTransaction($customer2->getAccounts()[0]['bankaccount'], -100);
        $bank->processTransaction($customer2->getAccounts()[1]['bankaccount'], 500);
        
        $saveAccount->addInterest(); // add interest

        //display
        echo "<br>";
        echo "<br>";
        foreach($bank->getCustomers() as $customer){
            echo "<h1>Customer Information</h1>";
            echo "Customer Name: " . $customer->getName() . "<br>";
            echo "Customer Email: " . $customer->getEmail() . "<br>";
            echo "Customer Address: " . $customer->getAddress() . "<br>";
            echo "Customer Phone: " . $customer->getContact() . "<br><br>";

            foreach($customer->getAccounts() as $account){
                echo "Account Number :" . $account['account']->getaccountnumber() . "<br>" . 
                "Balance : P " . $account['bankaccount']->getbalance() . "<br>";
            }
        }


        // $saveAccount->transaction(100, "deposit");
        // $saveAccount->addInterest();
        // $saveAccount->setInterestRate(5);
        // $saveAccount->addInterest();
        // echo "<h3>Saving Account</h3>";
        // echo $saveAccount->getbalance();


        // $checkAccount->withdraw(100);
        // $checkAccount->withdraw(50);
        // echo "<h3>Checking Account</h3>";
        // echo $checkAccount->getbalance();

        // $account = new BankAccount(100);
        // $customer = new Customer("JOHN DOE","johndoe@gamil.com","USA","555-1234");

        // echo "<h1>Customer Information</h1>";
        // echo "Customer Name: " . $customer->getName() . "<br>";
        // echo "Customer Email: " . $customer->getEmail() . "<br>";
        // echo "Customer Address: " . $customer->getAddress() . "<br>";
        // echo "Customer Phone: " . $customer->getContact() . "<br>";

        // // $account->accountNumber = "1";

        // // $account->deposit(50);
        // // $account->deposit(500);

        // // $account->withdraw(650);
        // // $account->deposit(100)
        // //         ->deposit(100)
        // //         ->withdraw(50);

        // $account->transaction(200, 'deposit');
        // $account->transaction(50, 'withdraw');

        // var_dump($account->getbalance());

        // $customer->setName("John Doe");
        // $customerName = $customer->getName();
        
        // echo "<br>";
        // echo "<h1>Account Information</h1>";
        // echo "Account Number: " . $account1->getaccountnumber() . "<br>";
        // echo "Balance: $" .$account->getbalance(). "<br>";
        ?>
</body>
</html>