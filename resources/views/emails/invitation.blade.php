<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Invitation - RCC</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f0f0f0;">
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; background-color: #f0f0f0;">
        <tr>
            <td style="padding: 20px; text-align: center;">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 800px; margin: 0 auto; background-color: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    
                    <!-- Header Section -->
                    <tr>
                        <td style="background-color: #0A2472; padding: 20px; text-align: left; border-radius: 8px 8px 0 0;">
                            <img src="{{ config('app.url') }}/assets/RCCLogo-White.png" alt="RCC Logo" style="height: 40px; display: block; border: 0; outline: none; text-decoration: none;">
                        </td>
                    </tr>
                    
                    <!-- Content Section -->
                    <tr>
                        <td style="padding: 40px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                <tr>
                                    <td>
                                        <h1 style="color: #0A2472; font-size: 32px; margin: 0 0 10px 0; line-height: 1.2; font-weight: bold; text-align: left;">Invitation for Interview</h1>
                                        <p style="color: #666; font-size: 18px; margin: 0 0 30px 0; line-height: 1.4; text-align: left;">You are invited to join the {{ $interviewTitle }}</p>

                                        <p style="color: #666; font-size: 16px; margin: 0 0 10px 0; text-align: left;">Invitation Details:</p>
                                        
                                        <!-- Details Table -->
                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; border-collapse: collapse; margin: 30px 0; border: 1px solid #ddd;">
                                            <tr>
                                                <td style="padding: 15px; border: 1px solid #ddd; background-color: #f9f9f9; color: #0A2472; font-weight: bold; width: 40%;">Title</td>
                                                <td style="padding: 15px; border: 1px solid #ddd; color: #0A2472;">{{ $title }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 15px; border: 1px solid #ddd; background-color: #f9f9f9; color: #0A2472; font-weight: bold;">Date</td>
                                                <td style="padding: 15px; border: 1px solid #ddd; color: #0A2472;">{{ $date }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 15px; border: 1px solid #ddd; background-color: #f9f9f9; color: #0A2472; font-weight: bold;">Time</td>
                                                <td style="padding: 15px; border: 1px solid #ddd; color: #0A2472;">{{ $time }}</td>
                                            </tr>
                                        </table>
                                        
                                        <!-- Buttons Section -->
                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin: 30px 0;">
                                            <tr>
                                                <td style="text-align: center; padding: 0 10px; width: 50%;">
                                                    <a href="{{ $acceptUrl }}" style="display: inline-block; width: 150px; background-color: #0A2472; color: white; padding: 15px 10px; text-decoration: none; border-radius: 4px; font-weight: bold; text-align: center; font-size: 16px; border: 0; outline: none;">Accept</a>
                                                </td>
                                                <td style="text-align: center; padding: 0 10px; width: 50%;">
                                                    <a href="{{ $declineUrl }}" style="display: inline-block; width: 150px; background-color: #dc3545; color: white; padding: 15px 10px; text-decoration: none; border-radius: 4px; font-weight: bold; text-align: center; font-size: 16px; border: 0; outline: none;">Decline</a>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <p style="color: #666; margin: 40px 0 0 0; font-size: 14px; line-height: 1.4;">This is an automatic Email. Please Do not Reply.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer Section -->
                    <tr>
                        <td style="background-color: #0A2472; color: white; padding: 15px; text-align: center; font-size: 14px; border-radius: 0 0 8px 8px;">
                            &copy;2025 RCC Colab Solutions Inc., All Right Reserved.
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>
</html>