<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gmail Verification</title>
</head>
    
    <body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

    
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        {{-- <tr>
                            <td bgcolor="#ffffff" align="center" valign="top"
                                style="padding: 20px 20px 20px 20px; border-radius: 4px 4px 0px 0px;">
                                <img src="https://ndgc-etl.com/Demo_hrms/images/ddu_mail_header.png" style="margin: 0; max-width:540px; "></h2>
                            </td>
                        </tr> --}}
                        
    
                        <tr>
                            <td bgcolor="#ffffff" align="center" valign="top"
                                style="padding: 30px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Poppins', sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
                                <h2 style="font-size: 36px; font-weight: 600; margin: 0;">Hi! {{$name}}</h2>
                            </td>
                        </tr>
    
                    </table>
                </td>
            </tr>
            <!-- COPY BLOCK -->
            <tr>
                <td align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <!-- COPY -->
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 20px 30px 10px 30px; color: #000281; font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 600; line-height: 25px;">
                                <p style="text-align:center">Please help us to verify your Gmail in Namdeo Matrimonial</p>
                            </td>
                        </tr>
    
    
                       
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 10px 30px 20px 30px; color: #E46013; font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 500; line-height: 25px;">
                                <p style="margin-bottom: 20px;"><span style="font-weight: 600;">Email :</span> <span style="text-decoration:none;color: #E46013;"> {{$email}}</span><br><span style="font-weight: 600;">Otp :</span> <span style="text-decoration:none;color: #E46013;">{{$otp}}</span> <br></p>
                            </td>
                        </tr>

                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 20px 30px 10px 30px; color: #000281; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="">Login From Here</p>
                            </td>
                        </tr>

                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <a href="{{env('APP_URL').'/login'}}" class="dwnld-btn" style="padding: 12px 20px;
                                text-decoration: none;
                                border: 1px solid #030050;
                                border-radius: 5px;
                                outline: none;
                                border: none;
                                color: white;
                                background-color: #030050;
                                transition: all 0.2s linear; ">
                                    Login
                                </a>
                            </td>
                        </tr>

                      
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 0px 30px 20px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">If you have any questions, just reply to this email <a href="mailto:info@namdeomatrimony.com" style="text-decoration:none;">info@namdeomatrimony.com</a> — we're always happy
                                    to help out.</p>
                            </td>
                        </tr>
                        <!-- COPY -->
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 0px 0px; color: #666666; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">Cheers,<br>{{env('APP_NAME')}} Team</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- FOOTER -->
            <tr>
                <td align="center" style="padding: 10px 10px 50px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 15px 30px 30px 30px; color: #aaaaaa; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                                <p style="margin: 0;">You received this email because you just signed up for a new account.
                                    If it looks weird, <a href="#" target="_blank"
                                        style="color: #999999; font-weight: 700;">view it in your browser</a>.</p>
                            </td>
                        </tr>
                        <!-- COPYRIGHT -->
                        <tr>
                            <td align="center"
                                style="padding: 30px 30px 30px 30px; color: #333333; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                                <p style="margin: 0;">Copyright © {{ Date('Y') }} {{env('APP_NAME')}}. All rights reserved.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>




    
</body>
</html>