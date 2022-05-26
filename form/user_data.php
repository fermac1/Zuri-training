<?php
    if(isset($_POST['submit'])){
        $name = $_POST['username'];
        $email = $_POST['useremail'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];  

        $user = array($name, $email, $dob, $gender, $country);
        print_r($user);

        $filename = "./userdata.csv";
        $file = fopen($filename, "a");//open file in append mode
        fwrite($file, $name. PHP_EOL); //write to file
        fwrite($file, $email. PHP_EOL);
        fwrite($file, $dob. PHP_EOL);
        fwrite($file, $gender. PHP_EOL);
        fwrite($file, $country. PHP_EOL);
        
        fclose($file);//close file
}
?>