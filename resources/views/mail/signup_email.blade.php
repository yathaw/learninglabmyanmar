 Hello {{ $email_data['name']}}
 <br><br>
 Welcome to my Website!
 <br><br>
 Please click the below link to verify your email 
 <br><br>
 <a href="http://localhost:8000/verify?code={{$email_data['verification_code']}}"><button style="border-radius: 2px; background-color: #2fc91e; height: 30px;">Click Here</button> </a>
 <br>
 <br>
 Thanks you!