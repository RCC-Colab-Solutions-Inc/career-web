<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Cancelled - RCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0; font-family: 'Poppins', Arial, sans-serif; background-color: #f0f0f0;">
    <div style="max-width: 800px; margin: 20px auto; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="background-color: #dc3545; padding: 20px;">
            <img src="/assets/RCCLogo-White.png" alt="RCC Logo" style="height: 40px;">
        </div>
        <div style="padding: 40px;">
            <h1 style="color: #dc3545; font-size: 28px; margin-bottom: 20px;">Interview Cancelled</h1>
            
            <p style="color: #333; font-size: 16px; margin-bottom: 30px;">
                Dear {{ $applicantName }},<br><br>
                We regret to inform you that your scheduled interview has been cancelled.
            </p>
            
            <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
                <p style="margin: 10px 0;"><strong>Interview:</strong> {{ $interviewTitle }}</p>
                <p style="margin: 10px 0;"><strong>Original Date:</strong> {{ $date }}</p>
                <p style="margin: 10px 0;"><strong>Original Time:</strong> {{ $time }}</p>
                @if($reason)
                    <p style="margin: 10px 0;"><strong>Reason:</strong> {{ $reason }}</p>
                @endif
            </div>
            
            <p style="color: #666; margin-top: 30px;">
                We apologize for any inconvenience this may cause. Our HR department will contact you if we need to reschedule.
            </p>
            
            <p style="color: #666; margin-top: 40px; font-size: 14px;">
                This is an automated email. Please do not reply.
            </p>
        </div>
        <div style="background-color: #0A2472; color: white; padding: 15px; text-align: center; font-size: 14px;">
            &copy;2025 RCC Colab Solutions Inc., All Right Reserved.
        </div>
    </div>
</body>
</html>