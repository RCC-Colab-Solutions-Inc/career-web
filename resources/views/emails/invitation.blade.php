<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Invitation - RCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', Arial, sans-serif; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px;">
    <div style="width: 100%; max-width: 800px; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="background-color: #0A2472; padding: 20px; text-align: left;">
            <img src="/assets/RCCLogo-White.png" alt="RCC Solutions" style="height: 40px;">
        </div>
        <div style="padding: 40px;">
            <h1 style="color: #0A2472; font-size: 32px; margin-bottom: 10px; line-height: 1.2;">Invitation for Interview</h1>
            <p style="color: #666; font-size: 18px; margin-bottom: 30px;">You are invited to join the {{ $interviewTitle }}</p>
            
            <p style="color: #666; font-size: 16px; margin-bottom: 10px;">Invitation Details:</p>
            <table style="width: 100%; border-collapse: collapse; margin: 30px 0; border: 1px solid #ddd; color: #0A2472;">
    <tr>
        <th style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">Title</th>
        <td style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">{{ $title }}</td>
    </tr>
    <tr>
        <th style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">Date</th>
        <td style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">{{ $date }}</td>
    </tr>
    <tr>
        <th style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">Time</th>
        <td style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">{{ $time }}</td>
    </tr>
</table>
            
            <div style="display: flex; justify-content: center; gap: 20px; margin: 30px 0;">
                <a href="{{ $acceptUrl }}" style="display: inline-block; width: 150px; background-color: #0A2472; color: white; padding: 15px 10px; text-decoration: none; border-radius: 4px; font-weight: bold; text-align: center; cursor: pointer;">Accept</a>
                <a href="{{ $declineUrl }}" style="display: inline-block; width: 150px; background-color: #0A2472; color: white; padding: 15px 10px; text-decoration: none; border-radius: 4px; font-weight: bold; text-align: center; cursor: pointer;">Decline</a>
            </div>
            
            <p style="color: #666; margin-top: 40px;">This is an automatic Email. Please Do not Reply.</p>
        </div>
        <div style="background-color: #0A2472; color: white; padding: 15px; text-align: center; font-size: 14px;">
            ©2025 RCC Colab Solutions Inc., All Right Reserved.
        </div>
    </div>
</body>
</html>