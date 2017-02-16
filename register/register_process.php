<?php
include "connect.php";
echo "hahaha";
session_start();
if(isset($_POST['submit']))
{
                echo"sakthi";
                $name=$_POST['name'];
                $password=$_POST['password'];
                $email_id=$_POST['email'];
                $ph_no=$_POST['phone'];
                $college=$_POST['college'];

                $_SESSION['name']=$name;
                $_SESSION['password']=$password;
                $_SESSION['ph_no']=$ph_no;
                $_SESSION['college']=$college;
                $_SESSION['email_id']=$email_id;

                /*whether the email is already is in the db*/

                echo " </br>email checking if already registered ";
                $q=mysqli_query($con,"select email from students")or die(mysqli_error($con));
                echo "</br>$email_id";
                        while($row =mysqli_fetch_assoc($q))
                        {
                                echo "</br>email_checking";
                                $table_email_id=$row['email'];
                                echo "</br>$table_email_id";
                                if($table_email_id==$email_id)
                                {
                                        //echo "</br>inside if ";
                                        $_SESSION['already_registered']="you have already residtered";
                                        header ("location:loginform.php");
                                }
                        }




                /* valide the email    */
 $to=$email_id;
                $subject='From Civilisation , Ceg';
                $rand_value=rand(500000,600000);
                $_SESSION['rand_value']=$rand_value;
				echo $rand_value;
                $_SESSION['time']=3;
                $body='Your confirmation code for Civilisation registration is '.$rand_value;
                $header='From Civilisation team';

                if(mail($to,$subject,$body,$header))
                {
                        echo "email has been sent to",$to;
                }
                else
                {
                        echo "there was an error sending this message";
                }
                unset($_POST['submit']);
//the below form is only given when server is able to send the mail to the specified email else redirect to reg_fom.php
        ?>

        <form action="register_process.php" method='POST'>

                Enter the code :<input name="confirm_code" type="text" >
        <input type="submit" name="confirm" value="confirm`">
        </form>


<?php


}

        elseif(isset($_POST['confirm']) && $_SESSION['time']>0 )
        {
                $time=$_SESSION['time'];
                if($_POST['confirm_code']==$_SESSION['rand_value'])
                {
                        echo "</br>inside if ";
                                $name=$_SESSION['name'];
 $email_id=$_SESSION['email_id'];
                                $ph_no=$_SESSION['ph_no'];
                                $college=$_SESSION['college'];
                                $password=$_SESSION['password'];
                                $passmd5=($password);
                                $rand=rand(1001,9999);
                                /* creating a unique id */
                                $q=mysqli_query($con,"select user_count from user_count") or die("cannot create user id. Register again to continue<a href='registerform'>                              Register </a> ");
                                $row=mysqli_fetch_array($q);
                                $count=$row['user_count'];
                                $count=$count+1;
                                $id="C17_".$count;
                                echo "after c 17 creation";

                                $q=mysqli_query($con,"update user_count set user_count=user_count+1") or die("cannot create user id. Register again to continue<a href='registerform'>Register </a> ");
                                echo "after updation of count";
                                mysqli_query($con,"insert into students values ('$id','$name','$passmd5','$email_id','$ph_no','$college')")
                                or die("Your resistration is unsuccessful please retry<a href='register_form.php'>Register </a>");

                                $to=$_SESSION['email_id'];
                                $subject='Registration for Civilisation ';
                                $body="You have successfully registered...Your civilisation Id is $id For further details contact email id .visit civilisation.org.in";
                                $header='From Civilisation team :';

                                mysqli_query($con,"update count set count=count+1 ");// or die(mysqli_error($con);
                                if(mail($to,$subject,$body,$header))
                                {
                                        echo "You have successfully registered...Your civilisation Id is $id and this details has been send to ".$to;
                                        echo  "</br><a href='loginform.php'>Login to continue </a> ";
                                }
                                else
 {
                                        echo "There was an error sending the email to $to  You have been successfully registered with us</br>
                                        <a href='loginform.php'>Login to continue </a> " ;
                                }

                }
                else if($time > 1 )
                {
						echo $_SESSION['rand_Value'];
                        
						$time=$time-1;
                        $_SESSION['time']=$time;

                        if($time<3 )
                        {
                                echo "You have entered worng confirmation code.<br> still $time attempts left ";
                        }
                        ?>
                        <form action="register_process.php" method='POST'>

                                Enter the code :<input name="confirm_code" type="text" >
                                <input type="submit" name="confirm" value="confirm`">
                        </form>
<?php
                }
                else
                {
                        echo "sakthi";
                        unset($_SESSION['rand_value']);
                        unset($_SESSION['name']);
                        unset($_SESSION['ph_no']);
                        unset($_SESSION['college']);
                        unset($_SESSION['email_id']);

                        header("location:regster_form.php" );
                }
        }

        else
        {
                        echo "prasath";
                        unset($_SESSION['rand_value']);
                        unset($_SESSION['name']);
                        unset($_SESSION['ph_no']);
                        unset($_SESSION['college']);
                        unset($_SESSION['email_id']);

                        header("location :register_form.php" );
        }

?>
